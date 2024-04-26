# Project Documentation - School Project

## Project Description
The School Project web application is designed to manage and organize school events, providing interfaces for both regular users and administrators. The application facilitates event registration, user management, and real-time updates to all stakeholders through a web interface developed in PHP. Using JSON files for data storage ensures flexibility and ease of maintenance.

## System Requirements
- **Web Server**: Apache or Nginx recommended.
- **PHP**: Version 8.3 required.

## Project Structure
- **/admin**: Contains administrative functionalities.
- **/json**: Houses JSON data files.
- **/lib**: Includes library scripts for common functionalities.
- **/css**: Comprises style sheets for the application.

## Installation and Setup
1. **Server Setup**:
   - Install and configure a web server with PHP 8.3.
   - Ensure the server has the necessary permissions for the `/json` directory.
2. **Deployment**:
   - Upload the project files to your server's web directory.
   - Access the project through `index.php` in the root directory.

## User Guide
### Accessing the System
Users access the system by navigating to the provided URL and logging in with their credentials.

### Functionalities Available to Users
- **Event Browsing**: Users can browse through a list of upcoming events on the main dashboard.
- **Event Registration**: Users can register for events, see event details, and confirm their participation through the event pages.
- **Viewing Announcements**: Users can view announcements related to school activities and events on their dashboard.

## Admin Guide
### Dashboard Access
Administrators log in through the main page to access the admin dashboard.

### User Management
- **Adding Users**: Navigate to `admin/users/adduser.php`.
- **Editing Users**: Edit users from the user list in the admin panel.
- **Deleting Users**: Remove users through the user management interface with confirmations.

### Event Management
- **Creating Events**: Done via `admin/events/manageevent.php`.
- **Modifying Events**: Event details can be edited using the modify option.
- **Deleting Events**: Remove events permanently through the delete option.

## Managing JSON Data Files
### Overview
JSON files store dynamic data related to users, events, and settings.

### Editing JSON Files
JSON files can be manually edited for direct data manipulation. Here are examples of common tasks:

#### Adding a New User
```json
{
  "users": [
    ...,
    {
      "id": "003",
      "name": "Jane Doe",
      "email": "jane@example.com",
      "admin": false
    }
  ]
}
```
#### Modifying an Event
To change the date of an event:
```json
{
  "events": [
    ...,
    {
      "id": "101",
      "name": "Science Fair",
      "date": "2024-05-15"
    }
  ]
}
```
#### Deleting a Setting
Remove a setting by deleting its entry:
```json
{
  "settings": [
    ...,
    {
      "theme": "dark"
    }
  ]
}
```

### Backup and Security
- **Backup**: Regularly back up JSON files.
- **Security**: Set strict permissions to prevent unauthorized access.

## Additional Resources
### FAQ
Addresses common questions and issues.

### Troubleshooting
Guidelines for diagnosing and fixing common problems.

### Contact Information
For technical support or administrative assistance, provide contact details.

## License
Licensed under the MIT License. See the LICENSE file for details.

