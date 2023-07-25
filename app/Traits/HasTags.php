<?php

namespace App\Traits;

use Illuminate\Support\Collection;

trait HasTags
{
    private const TAGS = [
        "AlpineJS",
        "Analista",
        "Angular",
        "API",
        "AWS",
        "Backend",
        "Bootstrap",
        "Nuvem (Cloud)",
        "Consultor",
        "Contrato",
        "Craft CMS",
        "Filamentphp",
        "CSS",
        "CS (Customer Success)",
        "Atendimento ao Cliente",
        "Design",
        "DevOps",
        "Engenheiro",
        "Frontend",
        "Fullstack",
        "Tempo integral",
        "Git",
        "Go",
        "JavaScript",
        "Júnior",
        "LAMP",
        "Laravel",
        "Líder (Lead)",
        "Linux",
        "Livewire",
        "MacOS",
        "Gerenciamento (Management)",
        "Microsoft",
        "MySQL",
        "Node.js",
        "Não tecnológico (Non-Tech)",
        "Open Source",
        "Meio período",
        "PHP",
        "Postgres",
        "QA",
        "React",
        "Redis",
        "SaaS",
        "Sênior",
        "SQL",
        "Statamic",
        "Symfony",
        "TailwindCSS",
        "TALL Stack",
        "TDD (Desenvolvimento Orientado a Testes)",
        "Suporte Técnico",
        "Unix",
        "VueJS",
        "WordPress",
    ];

    static function getTags(): Collection
    {
        return collect(self::TAGS);
    }

}
