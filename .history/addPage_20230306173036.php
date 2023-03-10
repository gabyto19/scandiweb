<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/vue@next" defer></script>
    <link rel="stylesheet" href="styles.css" />
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="addPage.js defer"></script>
    <title>Document</title>
</head>

<body>
    <div id="app">
        <nav>
            <h1>{{name}}</h1>
            <h2>Product Add</h2>
            <div class="rightButtons">
                <button @click="submitForm">Save</button>
                <button @click="toggleCancel" class="delete-checkbox" id="delete-product-btn">
                    <a style="text-decoration: none; color: black" href="/">Cancel</a>
                </button>
            </div>
        </nav>

        <div class="first">
            <label for="sku">SKU</label>
            <input type="text" id="sku" v-model="sku" required />
            <br />
            <label for="name">Name</label>
            <input type="text" id="name" v-model="name" required />
            <br />
            <label for="price">Price ($)</label>
            <input type="number" id="price" v-model="price" required />
        </div>
        <div class="second">
            <label for="productType" style="margin-right: 10px">Product Type</label>
            <select id="productType" v-model="selectedProductType">
                <option value="dvd">DVD</option>
                <option value="furniture">Furniture</option>
                <option value="book">Book</option>
            </select>
            <div class="lists">
                <div v-if="selectedProductType === 'dvd'">
                    <label for="size">Size (MB)</label>
                    <input type="number" id="size" v-model="size" />
                </div>
                <div v-if="selectedProductType === 'book'">
                    <label for="weight">Weight (Kg)</label>
                    <input type="number" id="weight" v-model="weight" />
                </div>
                <div v-if="selectedProductType === 'furniture'">
                    <label for="height">Height (cm)</label>
                    <input type="number" id="height" v-model="height" />
                    <br />
                    <label for="width">Width (cm)</label>
                    <input type="number" id="width" v-model="width" />
                    <br />
                    <label for="length">Length (cm)</label>
                    <input type="number" id="length" v-model="length" />
                </div>
            </div>
        </div>
    </div>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
  <script src="addPage.js"></script>
</body>

</html>

<style scoped>
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .first,
    .second {
        width: 80%;
        margin: auto;
    }

    .first,
    .second,
    .second div {
        margin-top: 2%;
    }

    .first label {
        width: 60px;
        display: inline-table;
        margin-top: 2%;
    }

    .lists label {
        width: 100px;
        display: inline-block;
        margin-top: 1%;
        margin-bottom: 1%;
    }

    .lists {
        width: 40%;
        border: solid 1px gray;
        padding: 10px;
    }

    nav button:first-child {
        margin-right: 10px;
    }

    .rightButtons button:first-child {
        margin-right: 10px;
    }
</style>