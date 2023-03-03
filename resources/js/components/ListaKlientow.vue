  <template>
    

  <div class="container" :class = "[ ukrywacz_szczegolow ? 'inactive'  : 'active']">
    <button @click="pokazuj()" type="button" class="btn btn-outline-primary">{{napis_przycisku}}</button>
    <br><br/>
    <div :class = "[ sprawdzacz ?  'active' : 'inactive', 'neutral']">    <AddRzeczForm v-on:przeladuj="getList()" /> </div>
    

    
  <table class="table table-hover" >
    <thead >
      <tr>
        <th scope="col">#</th>
        <th scope="col">Imie</th>
        <th scope="col">Nazwisko</th>
        <th scope="col">Numer telefonu</th>
        <th scope="col">Adres</th>
        <th scope="col">Email</th>
        <!-- <th scope="col">Dział</th>
        <th scope="col">Tytuł</th> -->
      </tr>
    </thead>
    <tbody>
      <tr v-for="(klient, index) in klienci" :key="index" >
         <PojedynczyRekordWLiscie :klient="klient" v-on:przeladuj = "getList()" v-on:szczegoly="pokaz_szczegoly()"/>
          
        </tr>
     
    </tbody>
  </table>
  </div>
  
  <div class="container">
    asdadadad
  </div>



  </template>

<script>

import PojedynczyRekordWLiscie from './PojedynczyRekordWLiscie.vue';
  import axios from 'axios';
import AddRzeczForm from './addRzeczForm.vue';
    export default {
      data: function () {
               return{klienci: [],
              sprawdzacz: false,
              ukrywacz_szczegolow: false,
              napis_przycisku: "+ Dodaj klienta"
            } 
        },

      methods : {
            getList () {axios.get('api/dane_klientow')
                        .then(response=>{
                          if(response.status == 200){
                          // this.$emit('rzecz_zostala_zaznaczona')
                          console.log("Pobrano dane z bazy!")};
                          this.klienci = response.data //jak dostaniemy jakieś dane to zapisujemy je w liscie: klienci
                          })
                        .catch(error=>{
                                        console.log(error);
                                      })
                      },

            pokazuj () {
                        if(this.sprawdzacz){
                          this.sprawdzacz=false;
                          this.napis_przycisku="+ Dodaj klienta"
                        }
                        else{this.sprawdzacz=true; this.napis_przycisku="Zwiń pole dodawania klienta"}
                      },
                    
            pokaz_szczegoly () {
              if(this.ukrywacz_szczegolow){
                this.ukrywacz_szczegolow=false;
                console.log('ukrywacz',this.ukrywacz_szczegolow)
              }
              else{this.ukrywacz_szczegolow=true;console.log('ukrywacz',this.ukrywacz_szczegolow) }
            },
        
        
                    },



        addRzecz() {
            if(this.rzecz.name == ""){
                return; //jeśli nic nie ma to funkcja tu się zakończy i nic nie wysle
            }

            axios.post("api/item/store",{
                rzecz: this.rzecz
            }).then( response =>{
                if(response.status == 201){
                    this.$emit('przeladuj_liste');
                    this.rzecz.name = "";
                }
            }).catch(error=>{
                console.log(error);
            })
        },           

      

        created(){
            this.getList();
        },
        components: {
    PojedynczyRekordWLiscie,
    AddRzeczForm
}
        
    }
    
</script>


<style scoped>
.neutral{
  display: none;
}
.active{
    display: block;
}
.inactive{
    display: none;
}
.table{
  display: block;
}
</style>