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
  created() {
    axios.get('get_products.php')
  .then(response => {
    console.log("connected");
  })
  .catch(error => {
    console.log(error);
  });

  },
 
}).mount("#app");
