# PIXL

A modern web application built with Vite, Tailwind CSS v4, and Laravel.

## Prerequisites

Before you begin, ensure you have the following installed:

- **Node.js** (v18 or higher) - [Download](https://nodejs.org/)
- **npm** (comes with Node.js)
- **PHP** (v8.1 or higher) - [Download](https://www.php.net/downloads.php)
- **Composer** - [Download](https://getcomposer.org/)

## Project Setup

### 1. Clone the Repository

```bash
git clone <repository-url>
cd PIXL
```

### 2. Install Frontend Dependencies

Install Node.js dependencies:

```bash
npm install
```

This will install:
- Vite (build tool and dev server)
- Tailwind CSS v4
- @tailwindcss/vite plugin

### 3. Start the Development Server

Run the Vite dev server:

```bash
npm run dev
```

The application will be available at `http://localhost:5173` (or the port shown in the terminal).

The dev server includes:
- Hot Module Replacement (HMR) for instant updates
- Tailwind CSS JIT compilation
- Live reload on file changes

### 4. Laravel Backend Setup (Optional)

If you need to work with the Laravel backend:

```bash
cd laravel-app

# Install PHP dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Run migrations
php artisan migrate

# Seed database (if seeders exist)
php artisan db:seed
```

## Project Structure

```
PIXL/
├── index.html              # Main HTML entry point
├── styles.css              # Tailwind CSS stylesheet with @theme configuration
├── vite.config.js         # Vite configuration with Tailwind plugin
├── tailwind.config.js      # Tailwind configuration
├── package.json            # Node.js dependencies and scripts
├── public/                 # Static assets
│   ├── fonts/             # Custom fonts (Departure Mono)
│   └── images/            # Image assets
└── laravel-app/           # Laravel backend application
```

## Design Tokens

The project uses custom design tokens defined in `styles.css`:

- **Colors:**
  - `pixl` (#ECA749) - Accent/highlight color
  - `pixl-light` (#EEEEEE) - Primary text color
  - `pixl-dark` (#090909) - Background color

- **Font:**
  - Departure Mono (monospace) - Default font family

These tokens are available as Tailwind utilities:
- `bg-pixl`, `bg-pixl-light`, `bg-pixl-dark`
- `text-pixl`, `text-pixl-light`, `text-pixl-dark`
- `font-pixl` (or use default `sans`)

## Development

### Available Scripts

- `npm run dev` - Start the Vite development server

### Building for Production

To build the project for production:

```bash
npm run build
```

The built files will be in the `dist/` directory.

## Technologies Used

- **Vite** - Next-generation frontend build tool
- **Tailwind CSS v4** - Utility-first CSS framework
- **Laravel** - PHP web framework (backend)
- **Departure Mono** - Custom monospace font

## Notes

- The project uses Tailwind CSS v4's `@theme` directive for configuration
- Dynamic viewport height (`h-dvh`) is used for mobile-friendly layouts
- Dark mode is enabled via `color-scheme: dark` meta tag
