<?php

namespace AlexMuhammad\SrpGenerator;

use RuntimeException;

class Generator
{
    protected $stubPath;

    public function __construct()
    {
        $this->stubPath = __DIR__ . '/Stubs';
    }

    public function generateRepository(string $name, string $model, string $path): void
    {
        $stub = file_get_contents($this->stubPath . '/repository.stub');
        $stub = str_replace('{{model}}', $model, $stub);
        $stub = str_replace('{{repository}}', $name, $stub);

        $full_path = $path . "/app/Repositories/{$name}.php";
        // make sure dir exists
        self::ensureDirectoryExists(dirname($full_path));
        file_put_contents($full_path, $stub);
        echo "Repository created successfully: {$full_path}\n";
    }

    public function generateService(string $name, string $repository, string $path): void
    {
        $stub = file_get_contents($this->stubPath . '/service.stub');
        $stub = str_replace('{{repository}}', $repository, $stub);
        $stub = str_replace('{{service}}', $name, $stub);

        $full_path = $path . "/app/Services/{$name}.php";
        // make sure dir exists
        self::ensureDirectoryExists(dirname($full_path));
        file_put_contents($full_path, $stub);
        echo "Service created successfully: {$full_path}\n";
    }

    public static function ensureDirectoryExists(string $dir): void
    {
        if (!is_dir($dir)) {
            if (!mkdir($dir, 0755, true)) {
                throw new RuntimeException("Failed to create directory: $dir");
            }
        }
    }
}
