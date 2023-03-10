Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
    };
  },
  methods: {
   
  },
  mounted() {
    axios.get('insert-product.php')
      .then(response => {
        this.products = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
 
}).mount("#app");
