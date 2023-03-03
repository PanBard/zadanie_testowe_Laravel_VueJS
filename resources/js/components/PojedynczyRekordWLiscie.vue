
<template>
    
        
          <th scope="row">{{ klient.id }}</th>
          <td>{{ klient.name }}</td>
          <td>{{ klient.surname }}</td>
          <td>{{ klient.phone_number }}</td>
          <td>{{ klient.adress }}</td>
          <td>{{ klient.email }}</td>
          <!-- <td>{{ klient.field }}</td>
          <td>{{ klient.department }}</td> -->
          <button @click="pokazuj()" type="button" class="btn btn-outline-secondary">Szczegóły</button>
          


          
          <div class="container"  :class = "[ sprawdzacz ?  'active' : 'inactive', 'neutral']"> 
          <!-- <td>{{ klient.field }}</td> -->
          <!-- <td>{{ klient.department }}</td> -->
          <!-- <th scope="row"><ModyfikacjaKlienta :klient="klient" /></th> -->
          <!-- <th scope="row"><ModyfikacjaKlienta :klient="klient" /></th> -->
            
            <button @click="usun_klienta_z_bazy_danych()" type="button" class="btn btn-outline-danger">Usuń</button>
          </div>
          

          

          
    </template>

<script>
  import axios from 'axios';
  // import ModyfikacjaKlienta from './ModyfikacjaKlienta.vue'
    export default {
      components: {
      // ModyfikacjaKlienta
  },
      data: function () {
               return{
              sprawdzacz: false,
              // napis_przycisku: "+ Dodaj klienta"
            } 
        },
      props: ['klient'],
      methods:{
        usun_klienta_z_bazy_danych(){
          if(confirm('Jesteś pewien?')){
            axios.delete('api/usun_klienta/'+this.klient.id,)
          
            
            .then(response=>{
                if(response.status == 200){
                    this.$emit('przeladuj');
                    console.log(this.klient.name,"o ID:",this.klient.id, "zostało usunięcte!!!!")
                }
                
            })
            .catch( error => {
                console.log(error);
            })
        }},
        pokazuj () {
                        if(this.sprawdzacz){
                          this.sprawdzacz=false;
                          // this.napis_przycisku="+ Dodaj klienta"
                          // this.$emit('szczegoly');
                        }
                        else{this.sprawdzacz=true; }
                      },
      }
    }

    
    
</script>


<style scoped>
.neutral{
  display: none;
}
.active{
    display: contents;
    position: absolute;
}
.inactive{
    display: none;
}
</style>