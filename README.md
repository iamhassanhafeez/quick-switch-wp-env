# 🔧 Multi-Environment Config Manager WP Plugin

A lightweight WordPress plugin to switch settings between development, staging, and production environments with ease. Built for developers and teams managing multiple environments for projects.

---

## 🚀 Features

- ✅ Set the current environment via WordPress Admin
- ✅ Supports **Development**, **Staging**, and **Production**
- ✅ Displays current environment notice in the dashboard
- ✅ Global helper function `mec_get_current_env()` for easy usage
- ✅ Extendable & developer-friendly

---

## 📦 Installation

### From GitHub

1. Clone this repository:

   ```bash
   git clone https://github.com/your-username/multi-env-config-manager.git
   ```

2. Upload to your `/wp-content/plugins/` directory.

3. Activate the plugin via **Plugins > Installed Plugins** in your WordPress dashboard.

---

## ⚙️ Usage

### 1. Configure the Environment

- Navigate to:\
  `WordPress Admin → Settings → Env Config Manager`

- Choose the appropriate environment:

  - Development
  - Staging
  - Production

### 2. Use in Your Code

```php
$env = mec_get_current_env();

if ( $env === 'development' ) {
    // Show debug logs or use test API keys
} elseif ( $env === 'staging' ) {
    // Show beta features or connect to staging DB
} elseif ( $env === 'production' ) {
    // Disable logging or load live keys
}
```

---

## 🧰 Developer Hooks & Functions

### `mec_get_current_env()`

Returns the selected environment.

```php
$current_env = mec_get_current_env(); // returns 'development', 'staging', or 'production'
```

---

## 📁 Folder Structure

```
multi-env-config-manager/
│
├── multi-env-config-manager.php   # Main plugin file
├── README.md                      # Plugin documentation
└── assets/
    ├── screenshot-1.png
    └── screenshot-2.png
```

---

## 👨‍💻 Author

**Hassan Hafeez**\
🔗 [Portfolio](https://iamhassanhafeez.github.io/portfolio/) • [GitHub](https://github.com/iamhassanhafeez) • [LinkedIn](https://www.linkedin.com/in/iamhassanhafeez/)\
📧 [iamhassanhafeez@gmail.com](mailto\:iamhassanhafeez@gmail.com)

---

## 📜 License

This plugin is licensed under the [GPL-2.0-or-later](https://www.gnu.org/licenses/gpl-2.0.html).

---

## 🙏 Acknowledgements

- Inspired by best practices for scalable WordPress development
- Built with ❤️ for the open source community

---

## 🌟 Show your support

If you find this plugin useful:

- ⭐ Star the repo on GitHub
- 🐞 Submit issues and suggestions
  
---

> © 2025 Hassan Hafeez — All Rights Reserved.

