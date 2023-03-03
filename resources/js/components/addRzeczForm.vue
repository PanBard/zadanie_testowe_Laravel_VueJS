<template>
    
    <div class="container">
    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Imię</span>
        </div>
        <input v-model="klient.name" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Nazwisko</span>
        </div>
        <input v-model="klient.surname" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Numer telefonu</span>
        </div>
        <input v-model="klient.phone_number" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Adres</span>
        </div>
        <input v-model="klient.adress" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Email</span>
        </div>
        <input v-model="klient.email" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Dział</span>
        </div>
        <input v-model="klient.field" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>

    <div class="input-group input-group-sm mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Tytuł</span>
        </div>
        <input v-model="klient.department" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
    </div>
    <button  @click="addklient()" type="button" class="btn btn-outline-secondary" >Wyslij</button>
</div>
    





</template>

<script>
import axios from 'axios';

export default {
    data : function () {
        return {
            klient: {
                name: "",
                surname : "",
                phone_number : "",
                adress : "",
                email : "",
                field : "",
                department : ""
            }
        }
    },
    methods: {
        addklient() {
            if(this.klient.name == ""){
                return; //jeśli nic nie ma to funkcja tu się zakończy i nic nie wysle
            }

            axios.post("api/wstaw_nowego_klienta",{
                klient: this.klient
            }).then( response =>{
                if(response.status == 201){

                    console.log(response)
                    this.$emit('przeladuj');
                    this.klient.name = "";
                    this.klient.surname = "";
                    this.klient.phone_number = "";
                    this.klient.adress = "";
                    this.klient.email = "";
                    this.klient.field = "";
                    this.klient.department = "";
                    alert("Zapisano nowego klienta!")
                }
            }).catch(error=>{
                console.log(error);
            })
        }           
    }
}
</script>


<style scoped>
.addklient{
    display: flex;
    justify-content: center;
    align-items: center;
}
input{
    background: #f7f7f7 ;
    border: 0px;
    outline: none;
    padding: 5px;
    margin-right: 10px;
    width: 100%;
}
.plus{
    font-size: 20px;
}
.active{
    color: #00CE25;
}
.inactive{
    color: #999999;
}
</style>