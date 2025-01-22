<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Strategy</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5;
        }
        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group input[type="checkbox"] {
            margin-right: 10px;
        }
        .form-group .checkbox-group {
            display: flex;
            flex-direction: column;
        }
        button {
            background: #007bff;
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
        .result {
            margin-top: 20px;
            padding: 10px;
            background: #e9ecef;
            border-radius: 4px;
            font-size: 14px;
            color: #333;
            display: none;
        }
    </style>
    <script>
        async function makePayment() {
    const methodElements = document.querySelectorAll('input[name="payment-method"]:checked');
    const methods = Array.from(methodElements).map(el => el.value);
    const amount = document.getElementById('amount').value;

    if (methods.length === 0) {
        alert('Please select at least one payment method.');
        return;
    }

    if (!amount) {
        alert('Please enter an amount.');
        return;
    }

    // Obtenha o token CSRF
    const csrfName = '<?= csrf_token() ?>';
    const csrfHash = '<?= csrf_hash() ?>';

    const response = await fetch('/payment/pay', {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/x-www-form-urlencoded' 
        },
        body: `method=${methods[0]}&amount=${amount}&${csrfName}=${csrfHash}` // Incluindo o token CSRF
    });

    const result = await response.json();

    const resultDiv = document.getElementById('result');
    resultDiv.style.display = 'block';

    if (result.error) {
        resultDiv.textContent = `Error: ${result.error}`;
        resultDiv.style.color = 'red';
    } else {
        resultDiv.textContent = result.message;
        resultDiv.style.color = 'green';
    }
}
    </script>
</head>
<body>
    <div class="container">
        <h1>Payment Method</h1>
        <div class="form-group">
            <label for="amount">Enter Amount:</label>
            <input type="number" id="amount" placeholder="Enter amount" min="1" required>
        </div>
        <div class="form-group">
            <label>Select Payment Method:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="payment-method" value="creditcard"> Credit Card</label>
                <label><input type="checkbox" name="payment-method" value="paypal"> PayPal</label>
            </div>
        </div>
        <button onclick="makePayment()">Pay</button>
        <div id="result" class="result"></div>
    </div>
</body>
</html>
