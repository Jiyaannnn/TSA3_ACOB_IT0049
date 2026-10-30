# Soluna Tasks for Today — TSA3

Laravel rebuild of my TSA1 Tasks for Today Management System, continued from TFA6 in a separate folder. I retained Soluna's branding and interactions and the original TSA1 task titles and sample user.

**Student:** Jian Edward A. Acob · **Section:** BSITBA - TW32  
**Course:** IT0049 - Web System Technologies · **Professor:** Mr. Von Erick Magbitang

## Setup

Requirements: PHP 8.3+ with PDO SQLite, Composer, and Git. Verified locally with PHP 8.5.10 and Laravel 13.37.0. No Node build or database server is needed; assets are served from `public/assets`.

```bash
git clone https://github.com/Jiyaannnn/TSA3_ACOB_IT0049.git
cd TSA3_ACOB_IT0049
composer install
cp .env.example .env
php artisan key:generate
php -r "touch('database/database.sqlite');"
php artisan migrate --seed
php artisan serve --host=127.0.0.1 --port=8087
```

Open http://127.0.0.1:8087. To run the prepared local project:

```bash
cd "/Users/jiyan/School Files/WebSys Tech/TSA3_ACOB_IT0049"
php artisan serve --host=127.0.0.1 --port=8087
```

The application uses **Asia/Manila** time. The seeder creates nine tasks across yesterday, today, tomorrow, and two days from today, with four tasks for today and exactly one sample user (Mara Santos). Dates are stored as dates, so seeded tasks do not move automatically as the calendar advances. For a later demonstration, `php artisan db:seed` refreshes the sample dates. Run that command only when you want to reset the seeded sample values.

## Required pages and MVC

| Route | Action | Behavior |
| --- | --- | --- |
| `/` | TaskController@today | Eloquent `whereDate('task_date', today())` returns only today's tasks. |
| `/tasks` | TaskController@index | Returns every task ordered by task_date, then ID. |
| `/profile` | UserController@index | Retrieves the single sample database user. |
| `/about` | PageController@about | Static application and student developer information. |

A route calls a controller; the controller retrieves Eloquent models and passes them to Blade. Welcome and Task List share `pages/task-table.blade.php`. Blade escapes output. Browser search filters visible rows without modifying the database. The original solar image, rooftop markers, energy explainer, and accessible mobile menu remain available. Account directory source files from TFA6 remain as inherited code but have no active routes in TSA3.

## Database

| Table | Columns |
| --- | --- |
| tasks | id, title VARCHAR(150), status VARCHAR(20) default pending, task_date DATE, created_at, updated_at |
| users | id, unique username VARCHAR(50), full_name VARCHAR(100), email VARCHAR(100), created_at |

The original TSA1 task/user values are retained. The tasks updated_at column follows TSA3's explicit timestamps requirement. The User model disables updated_at to match TSA1. SQLite does not enforce VARCHAR lengths. TFA6's unused customers and Laravel cache/jobs migrations remain inherited; the seeder populates only tasks and users. Migrations and the seeder are the reproducible database submission, so no database export is needed. Seeding an unchanged database twice retains nine tasks and one user.

## Verification performed

```bash
php artisan route:list --except-vendor
php artisan test --compact
vendor/bin/pint --dirty --format agent
```

- 8 tests, 39 assertions passed: routes and 404, record counts and dates, date ordering, Manila midnight rollover, reseeding, empty tasks/profile, pending default, insert/update/delete, escaped HTML, duplicate username and missing-title rejection, and migration rollback/rebuild. Tests use isolated in-memory SQLite.
- Browser: all four pages at 390, 768, and 1440 px had no horizontal overflow; matching/nonmatching search returned one/zero tasks; Menu and Escape worked; rooftop Crew and About Inverter updated their text. Browser error checks returned no uncaught errors.
- Automated axe checks on Welcome and Task List reported zero violations after the table-heading contrast fix. Background/gradient contrast checks remained incomplete and are not claimed as a full accessibility certification.
- No editing forms, uploads, authentication, or task-status-changing controls are required or provided.

## Evidence and presentation

- [Report](docs/ACOB_IT0049_TSA3_Soluna.docx)
- [Screenshot checklist](docs/SCREENSHOT_CHECKLIST.md)
- [Presentation guide](docs/PRESENTATION_GUIDE.md)
- [Final requirement audit](docs/REQUIREMENTS_AUDIT.md)

All screenshots are real browser captures. Report crops preserve visible evidence; full captures remain in `docs/evidence`. The retained rooftop image is an AI-generated illustration from TFA6, not evidence of a real solar installation. AI assisted implementation and documentation; the activity requires neither integrated AI nor an AI conversation, and none was fabricated.

## Submission

Repository: https://github.com/Jiyaannnn/TSA3_ACOB_IT0049

This follows my GitHub-only publishing instruction. The handout separately requires a hosted working application link; that item remains unmet because no hosting was requested. The localhost address is not a public deployment.

Secrets, `.env`, SQLite databases, dependencies, and runtime caches are excluded. `.env.example` contains no application key. Both original projects remain untouched.
