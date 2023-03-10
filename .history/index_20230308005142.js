Vue.createApp({
  data() {
    return {
      sku: "",
      name: "",
      price: "",
      dimension: "",
      allData: "",
    };
  },
  methods:{
    fetchAllData:function(){
      axios.post('insert-product.php', {
       action:'fetchall'
      }).then(function(response){
       application.allData = response.data;
      });
     },
  },
}).mount("#app");
