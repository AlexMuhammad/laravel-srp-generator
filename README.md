# Service Repository Pattern Generator Laravel

Just make some fun with this.

## Requirements

- PHP 8.0 or higher.
- Composer (for dependency management).
- Laravel 8.x, 9.x, 10.x, or 11.x project.

## How to Use

1. Clone the Repository
   Clone this repository into your Laravel project directory:

   ```bash
   https://github.com/AlexMuhammad/laravel-srp-generator
   ```

2. Install Dependencies
   Run the following command to install dependencies:

   ```bash
   cd laravel-srp-generator
   composer install
   ```

3. Make the File Executable
   Make the cli.php file executable:

   ```bash
   chmod +x cli.php
   ```

4. Generate a Repository
   To generate a Repository class, run the following command:

   ```bash
   ./cli.php make:repository UserRepository --model=User
   ```

   The UserRepository.php file will be created in the app/Repositories/ directory.

5. Generate a Service
   To generate a Service class, run the following command:

   ```bash
   ./cli.php make:service UserService --repository=UserRepository
   ```

   The UserService.php file will be created in the app/Services/ directory.

## Generated File Structure

After running the commands, the file structure will look like this:

```bash
app/
├── Repositories/
│   └── UserRepository.php
├── Services/
│   └── UserService.php
└── Models/
    └── User.php
```
