# Animated Login System

A stylish login system featuring modern CSS animations and effects.

## Features

- Secure PHP session-based authentication
- Modern dark UI with gradient backgrounds
- Animated rainbow border effect around the login card
- Interactive button with outline style and hover animation
- Form validation with error messages

## Technical Details

- Built with PHP for backend authentication
- CSS animations for visual effects
- Session management for user authentication state
- Simple demo credentials (admin/password123)

## Animation Details

The animated border effects are inspired by examples found online.
Source for the animation: https://www.sliderrevolution.com/resources/css-border-animation/

## Usage

1. Place the files on a PHP-enabled web server
2. Access index.php in your browser
3. Login with demo credentials:
   - Username: admin
   - Password: password123

## Files

- `index.php` - Login page with form and authentication
- `welcome.php` - Protected page shown after successful login
- `logout.php` - Handles session destruction and logout
- `styles.css` - Contains all styling and animations

## Security Note

This is a demonstration project. For production use, implement proper security measures:
- Password hashing
- Database storage
- CSRF protection
- Secure session handling