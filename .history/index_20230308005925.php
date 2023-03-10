<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Vue Basics</title>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="styles.css" />
  <script src="https://unpkg.com/vue@next" defer></script>
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body>
  <section id="app">
    <nav>
      <h2>Product List</h2>
      <div class="rightButtons">
        <button><a style="text-decoration: none; color: black" href="addPage.php">ADD</a>
        </button>
        <button class="delete-checkbox" id="delete-product-btn">MASS DELETE</button>
      </div>
    </nav>


    <div class="grid-container">
      <div v-for="row in allData">
        <input type="checkbox" id="delete-checkbox" class="delete-checkbox" />
        <p>row.name</p>
        <p>Test</p>
        <p>Test$</p>
        <p>Dimension: Test</p>

      </div>
    </div>
    </div>
  </section>

  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="index.js"></script>

</body>

</html>
<style scoped>
  .rightButtons button:first-child {
    margin-right: 10px;
  }

  .grid-container {
    display: grid;
    grid-template-columns: auto auto auto auto;
    gap: 40px;
    padding: 10px;
    width: 80%;
    margin: auto;
  }

  .grid-container>div {
    text-align: center;
    border: solid 1px;
    width: 85%;
  }

  .grid-container input {
    display: block;
    position: relative;
    left: 5%;
    top: 10%;
  }
</style>