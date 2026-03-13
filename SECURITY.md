# Security Policy

## Supported Versions

As this is a testing-oriented project, we support security patches for the following:

| Version | Supported          |
| ------- | ------------------ |
| Main    | :white_check_mark: |
| Legacy  | :x:                |

## Testing and Security

CrazyBlog is designed to demonstrate automated testing. However, security remains a priority:

1.  **Sanitized Content:** Since this is a blog, we aim to prevent Cross-Site Scripting (XSS) in posts and comments.
2.  **No Production Data:** Never use real personal data or production credentials within the automated test suites or the database.
3.  **Dependency Scanning:** We encourage regular updates of project dependencies to avoid known vulnerabilities.

## Reporting a Vulnerability

**Please do not report security vulnerabilities via public GitHub issues.**

If you find a way to bypass authentication, perform an injection, or crash the system through a security flaw:

Open a **Private Vulnerability Report** on GitHub.

We aim to acknowledge all security reports within **24 hours**.
