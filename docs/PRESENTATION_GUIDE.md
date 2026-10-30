# Presentation guide

1. Start the project using the exact commands in README. If demonstrating on a later date, run `php artisan db:seed` first to refresh sample dates. This overwrites the seeded sample values.
2. Open Overview. First demonstrate the original hero, customer/team cards, and solar workflow; then scroll to today’s tasks. Say: “I rebuilt my TSA1 system in Laravel while keeping my Soluna design. The added task section shows only tasks scheduled for today in Manila; my existing account features remain.” Point to the current date and four rows.
3. Open Customer Accounts and User Accounts and show the original five records, search, and filters. Then open Task List. Point out nine tasks across four dates in chronological order. Search for Calibrate, then a nonexistent title, then clear the search. Explain that search changes the visible rows, not the database.
4. Open Profile. Explain that Mara Santos is the original sample user, while you are the developer identified on About. There is exactly one seeded task-profile user; five existing team accounts remain in team_members and no login functionality.
5. Open About. Show your name, course, section, and activity title. Demonstrate Inverter and the retained solar explanation.
6. Show `routes/web.php`, `TaskController.php`, and `UserController.php`. Explain: “The route selects a controller, Eloquent retrieves records, and Blade displays them.” Eloquent is Laravel's model-based way to query database tables.
7. Point to `whereDate('task_date', today())` for today's filter and `orderBy('task_date')` for the full list. Explain that an empty day correctly displays no tasks.
8. Show the tasks/users/team_members migrations and DatabaseSeeder. A migration defines table structure; a seeder inserts repeatable sample data. Tasks default to pending. Username must be unique. Relative seed dates keep the demonstration useful when reseeded.
9. Show the shared Blade table and its escaped `{{ }}` output. Explain that escaped text prevents a stored HTML title from becoming executable markup.
10. Resize to mobile and demonstrate Menu/Escape. End by showing the test results, real screenshots, and GitHub repository.

## Honest scope

The required activity is read-only. I did not implement task editing, uploads, authentication, or integrated AI. AI assisted my code and documentation; I should study the queries and explain them in my own words. The handout requests hosting, but this submission follows my GitHub-only instruction and has no live public application link.
