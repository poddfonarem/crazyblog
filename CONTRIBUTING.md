# Contributing to CrazyBlog

Welcome! Since CrazyBlog is a sandbox for automated testing, we highly value contributions that improve test coverage, performance, and code reliability.

---

## How to Contribute

### 1. Adding New Tests
If you are adding new automated tests (Selenium, Cypress, Playwright, Unit tests, etc.):
* **Location:** Place your tests in the appropriate directory (e.g., `/tests` or `/e2e`).
* **Clean State:** Ensure your tests leave the database/system in a clean state after execution.
* **Documentation:** Briefly explain what your test covers (e.g., "Tests the comment submission flow").

### 2. Improving the Blog Engine
If you are modifying the core blog functionality:
* **Run Existing Tests:** Before submitting a PR, ensure that all existing automated tests pass (`npm test` or equivalent).
* **No Breaking Changes:** If you change the UI elements (IDs, classes), please update the corresponding test selectors.

### 3. Pull Request Process
1.  **Fork** the repository and create your feature branch.
2.  **Commit Messages:** Use clear messages (e.g., `feat: add smoke tests for login page`).
3.  **Test Results:** If possible, include a summary or screenshot of your test execution results in the PR description.
4.  **Submit PR:** Link any related issues and wait for a review!

---

## Technical Standards

* **Idempotency:** Tests should be able to run multiple times without failing due to leftover data.
* **Selectors:** Use dedicated test attributes (like `data-testid`) where possible, instead of fragile CSS selectors.
* **Environment:** Use `.env.example` to define any environment variables needed for the testing suite.

---

Thank you for contributing to the testing ecosystem of CrazyBlog! 🚀
