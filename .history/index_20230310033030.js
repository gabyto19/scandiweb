Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
      selectedProducts: [],
      
    };
  },
  methods: {
    deleteProducts() {
      const selectedProducts = this.selectedProducts;
      axios
        .post("delete_products.php", {
          ids: selectedProducts
        })
        .then((response) => {
          // handle success response
          console.log(response.data);
          // remove deleted products from the list
          this.products = this.products.filter(
            (product) => !this.selectedProducts.includes(product.id)
          );
          // clear selectedProducts array
          this.selectedProducts = [];
        })
        .catch((error) => {
          // handle error response
          console.log(error);
        });
    },
  },
  created() {
    axios
      .get("get_products.php")
      .then((response) => {
        this.products = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  },
}).mount("#app");
