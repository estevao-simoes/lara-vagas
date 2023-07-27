<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasTags
{
    private const TAGS = [
        'AlpineJS',
        'Analista',
        'Angular',
        'API',
        'AWS',
        'Backend',
        'Bootstrap',
        'Nuvem (Cloud)',
        'Consultor',
        'Contrato',
        'Craft CMS',
        'Filamentphp',
        'CSS',
        'CS',
        'Atendimento ao Cliente',
        'Design',
        'DevOps',
        'Engenheiro',
        'Frontend',
        'Fullstack',
        'Tempo integral',
        'Git',
        'Go',
        'JavaScript',
        'Júnior',
        'Pleno',
        'Senior',
        'LAMP',
        'Laravel',
        'Tech Lead',
        'Linux',
        'Livewire',
        'MacOS',
        'Gerência',
        'Microsoft',
        'MySQL',
        'Node.js',
        'Produto',
        'Open Source',
        'Meio período',
        'PHP',
        'Postgres',
        'QA',
        'React',
        'Redis',
        'SaaS',
        'SQL',
        'Statamic',
        'Symfony',
        'TailwindCSS',
        'TALL Stack',
        'TDD',
        'Suporte Técnico',
        'Linux',
        'VueJS',
    ];

    static function getTags(): Collection
    {
        return collect(self::TAGS);
    }

    static function getTagsAsArray(): array
    {
        return self::getTags()->toArray();
    }

    static function getTag($index): string
    {
        return self::TAGS[$index];
    }
}
