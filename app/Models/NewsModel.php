<?php

namespace App\Models;

use CodeIgniter\Model;

class NewsModel extends Model
{
    protected $table = 'news'; // Nome da tabela no banco de dados
    protected $allowedFields = ['title', 'slug', 'body'];

    public function getNews(?string $slug = null)
    {
        if ($slug === null) {
            return $this->findAll(); // Retorna todas as notícias
        }

        return $this->where(['slug' => $slug])->first(); // Retorna uma notícia específica pelo slug
    }
}
