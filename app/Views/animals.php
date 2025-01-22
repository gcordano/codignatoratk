<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Animal Factory</title>
    <script>
        async function createAnimal() {
            const type = document.getElementById('animal-type').value;
            const response = await fetch('/animal/create', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `type=${type}`
            });
            const result = await response.json();
            if (result.error) {
                document.getElementById('result').textContent = `Error: ${result.error}`;
            } else {
                document.getElementById('result').textContent = `Animal: ${result.type}, Sound: ${result.sound}`;
            }
        }
    </script>
</head>
<body>
    <h1>Animal Factory</h1>
    <input type="text" id="animal-type" placeholder="Enter animal type (dog/cat)">
    <button onclick="createAnimal()">Create Animal</button>
    <p id="result"></p>
</body>
</html>
