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

  <script src="app.js" defer></script>
</head>

<body>
  <section id="app">

  </section>

  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="app.js"></script>
  <script>
    import { createRouter, createWebHistory } from 'vue-router'

    const routes = [
      { path: '/', component: Home },
      { path: '/add-product', component: ProductAdd }
    ]

    const router = createRouter({
      history: createWebHistory(),
      routes
    });

  </script>
</body>

</html>
<style scoped>

</style>