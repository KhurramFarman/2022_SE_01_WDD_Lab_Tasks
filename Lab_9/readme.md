
# Lab Task 9 – Web Design and Development (WDD)

This folder contains **Lab 9**, a client-side form validation exercise that demonstrates validating typical registration fields (names, phone, email, password) using vanilla JavaScript and providing inline error messages. The form submits to `submission.php` on successful validation.

---

## 📝 Task Overview

The lab implements a registration form with client-side validation rules enforced before the form is submitted to the server. Validation covers required fields, length constraints, phone number format, basic email format, password strength (length, uppercase, symbol), and password confirmation.

### Key Concepts Covered:

- Selecting form elements and listening for submit events
- Preventing default form submission when validation fails
- Inline error messaging using dedicated span elements
- Regular expressions for validating phone numbers and email
- Basic password strength checks (length, uppercase, symbol)
- Graceful degradation: server-side `submission.php` can still handle the POST if client-side JS is disabled

---

## 🔗 Live Preview

Open `index.html` locally in a browser to try the form and see client-side validation behavior. The form posts to `submission.php` when validation passes.

---

## 🛠️ Technologies Used

- **HTML5** — Registration form markup (`index.html`)
- **CSS3** — Styling in `style.css`
- **JavaScript (ES6)** — Client-side validation logic (`validation.js`)
- **PHP** — Server-side receiver script (`submission.php`) for form POST handling

---

## 📁 Folder Structure

```
Lab_9/
├── index.html        # Registration form (client-side validation)
├── style.css         # Styles for the form and layout
├── validation.js     # JavaScript that validates form fields and shows inline errors
├── submission.php    # Server-side script that receives the POST (basic receiver)
└── readme.md         # This file
```

---

## ✅ Task Requirements

- Validate required input fields and show inline error messages
- Enforce field-specific rules: name lengths, 11-digit phone format, basic email format, password strength, and password confirmation
- Prevent form submission when client-side validation fails
- Keep validation logic in a separate `validation.js` file

---

## ✨ Outcome

This lab provides a practical form validation example that improves UX by catching common input errors on the client before sending data to the server. The `validation.js` file is a straightforward reference for implementing similar validation rules in other forms.
