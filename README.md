# 📝 Crazy Blog

**Crazy Blog** is a simple web blog that can be deployed on any local server. It is suitable for learning, testing, or creating personal blogs.

---

## ⚙️ Requirements

- Apache 2.4
- PHP 8.0
- MySQL 8.0

---

## 🧰 Frameworks Used

- [Bootstrap 5.3](https://getbootstrap.com/)

---

## 📁 Project Structure

```
├── .github/workflows         # CI/CD configuration (GitHub Actions)
├── assets/                   # CSS, images, JS
├── database/                 # SQL dump (crazyblog.sql)
├── includes/                 # Query handlers, page blocks
├── src/Services/             # Service classes
├── tests/                    # Automated tests (Behat, Codeception...)
├── uploads/                  # Uploaded user avatars
├── .htaccess                 # Apache configuration
├── index.php                 # Main page
├── login.php                 # Login page
├── profile.php               # User profile page
├── blog.php                  # Blog page
├── composer.json / lock      # Composer configuration
├── phpstan.neon              # PHPStan config
├── behat.yml                 # Behat config
├── codeception.yml           # Codeception config
```

---

## 🚀 How to Run

1. **Download and install [OpenServer](https://ospanel.io/)**.
2. Configure OpenServer to use Apache 2.4, PHP 8.0, and MySQL 8.0.
3. In the `domains` folder, create a directory named `crazy-blog` (or any other name) and copy the contents of this repository there.
4. Launch OpenServer.
5. Open phpMyAdmin (via OpenServer) and import the `crazyblog.sql` file from the `database` folder.
6. Open the site in your browser: `http://crazy-blog/`

---

## 📄 License

See [LICENSE](./LICENSE) file.

---

🌐 Made with ❤️ PODDFONAREM
