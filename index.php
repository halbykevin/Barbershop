<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Selection</title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <div class="sidebar">
      <h2>Selected Services</h2>
      <ul id="selectedServices"></ul>
      <div class="total">
        <strong>Total:</strong> $<span id="totalAmount">0</span>
      </div>
    </div>
    <div class="container">
      <div class="top-buttons">
        <a href="box.php"><button class="box-btn">Box</button></a>
        <a href="contacts.php"
          ><button class="contacts-btn">Contacts</button></a
        >
      </div>
      <div class="buttons">
        <button onclick="addToSidebar('Shower', 10)">Shower</button>
        <button onclick="addToSidebar('Hair', 20)">Hair</button>
        <button onclick="addToSidebar('Beard', 40)">Beard</button>
      </div>
    </div>
    <script src="script.js"></script>
  </body>
</html>