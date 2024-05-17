<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacts Page</title>
    <link rel="stylesheet" href="stylesC.css" />
  </head>
  <body>
    <div class="container">
      <div class="left-button">
        <a href="index.php"><button class="back-button">Back</button></a>
      </div>
      <div class="content">
        <input type="text" id="searchBar" placeholder="Search contacts..." />
      </div>
      <div class="right-section">
        <button class="create-btn" onclick="showForm()">
          Create New Contact
        </button>
        <div id="contactForm" class="hidden">
          <form onsubmit="saveContact(event)">
            <div>
              <label for="name">Name:</label>
              <input type="text" id="name" required />
            </div>
            <div>
              <label for="number">Number:</label>
              <input type="text" id="number" required />
            </div>
            <div>
              <label for="birthdate">Birthdate:</label>
              <input type="date" id="birthdate" required />
            </div>
            <div>
              <label for="address">Address:</label>
              <input type="text" id="address" required />
            </div>
            <button type="submit" class="save-btn">Save Contact</button>
          </form>
        </div>
      </div>
    </div>
    <script src="scriptC.js"></script>
  </body>
</html>
