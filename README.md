# Carpathians

WordPress theme with ACF Pro, Tailwind CSS v4, and Vite.

## Requirements

- [Docker](https://www.docker.com/)
- [Composer](https://getcomposer.org/)
- [Node.js 20](https://nodejs.org/) (via [nvm](https://github.com/nvm-sh/nvm))

## Setup

### 1. Start Docker

```bash
docker compose up -d
```

WordPress will be available at http://localhost:8009
Adminer at http://localhost:8089

### 2. Install PHP dependencies

```bash
composer install
```

This installs ACF Pro and Safe SVG into `wp-content/plugins/`.

> **Note:** `auth.json` is committed to this repository intentionally. It contains the ACF Pro license key required for Composer to install the plugin.

### 3. Install Node dependencies

```bash
nvm use
cd wp-content/themes/carpathians
npm install
```

### 4. Activate plugins and theme

From the **project root**:

```bash
bash bin/setup.sh
```

### 5. Build assets

From `wp-content/themes/carpathians/`:

Development (with HMR):
```bash
npm run dev
```

Production build:
```bash
npm run build
```
