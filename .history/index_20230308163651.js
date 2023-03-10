Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      products: [],
      deleteIds: [],
    };
  },
  methods: {
   
  },
  created() {
    axios.get('get_products.php')
      .then(response => {
        this.products = response.data;
      })
      .catch(error => {
        console.log(error);
      });
  },
 
}).mount("#app");
