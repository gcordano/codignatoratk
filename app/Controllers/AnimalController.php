<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

interface Animal {
    public function makeSound(): string;
}

class Dog implements Animal {
    public function makeSound(): string {
        return "Woof!";
    }
}

class Cat implements Animal {
    public function makeSound(): string {
        return "Meow!";
    }
}

class AnimalFactory {
    public static function createAnimal(string $type): Animal {
        return match (strtolower($type)) {
            'dog' => new Dog(),
            'cat' => new Cat(),
            default => throw new \InvalidArgumentException("Animal type not supported."),
        };
    }
}

class AnimalController extends BaseController {
    public function create() {
        $type = $this->request->getPost('type');
        try {
            $animal = AnimalFactory::createAnimal($type);
            return $this->response->setJSON([
                'type' => $type,
                'sound' => $animal->makeSound()
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'error' => $e->getMessage()
            ], ResponseInterface::HTTP_BAD_REQUEST);
        }
    }

    public function index() {
        return view('animals');
    }
}
