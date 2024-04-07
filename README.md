# Project Title

This is a PHP-based web application that provides a platform for users to register and login to access certain events. The application is built with PHP and uses INI files for data storage. The project also utilizes object-oriented programming with classes.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

- PHP 8.3 or higher
- A web server (like Apache or Nginx)
- A modern web browser

### Installation

1. Clone the repository to your local machine.
2. Configure your web server to point to the project's directory.
3. Open the project in your web browser.

## Usage

The application provides the following functionalities:

- User Registration: New users can register for an account.
- User Login: Registered users can login to the system.
- Event Registration: Logged in users can register for events.

## File Structure

- `15/register.php`: Handles the registration of users to events.
- `15/login.php`: Handles user login functionality.
- `15/lib/loadUser.php`: Loads user data from an INI file.
- `15/lib/sessionstart.php`, `15/lib/loadevents.php`, `15/lib/lib.php`: Contains various utility functions used across the application.
- `15/classes/user.php`: Defines the `user` class.

## Contributing

Please read `CONTRIBUTING.md` for details on our code of conduct, and the process for submitting pull requests to us.

## License

This project is licensed under the MIT License - see the `LICENSE.md` file for details.

## Acknowledgments

- Thanks to all contributors who have helped to improve this project.