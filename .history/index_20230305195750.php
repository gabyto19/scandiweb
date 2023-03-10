<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vue Basics</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <script src="https://unpkg.com/vue@next" defer></script>
    <script src="app.js" defer></script>
    <script src="main.js" defer></script>
  </head>
  <body>
    <section id="app">
    <nav>
    <h2>Product List</h2>
    <div class="rightButtons">
      <button @click="toggleAdd">
        <router-link style="text-decoration: none; color: black" to="add-product">ADD</router-link>
      </button>
      <button class="delete-checkbox" id="delete-product-btn">MASS DELETE</button>
    </div>
  </nav>      
    </section>

    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="app.js"></script>
    <script src="main.js"></script>

  </body>
</html>
