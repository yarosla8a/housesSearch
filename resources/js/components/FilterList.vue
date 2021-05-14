<template>
    <div class="container">

        <form class="row g-2 p-3">
            <div class="col-md-4">
                <label for="name" class="form-label">name</label>
                    <input v-model="name" type="text" placeholder="name" class="form-control" id="name">
                </div>

            <div class="col-md-3">
                <label class="form-label" for="price_min">price min</label>
                <input v-model="price_min" type="text" placeholder="min" class="form-control" id="price_min" >
            </div>

            <div class="col-md-3">
                <label class="form-label" for="price_max">price max</label>
                <input v-model="price_max" type="text" placeholder="max" class="form-control"  id="price_max">
            </div>

            <div class="col-md-3">
                <label for="bedrooms" class="form-label">bedrooms</label>
                    <select class="form-select" v-model="bedrooms"  id="bedrooms" >
                        <option selected > - </option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
            </div>

            <div class="col-md-3">
                <label class="form-label" for="bathrooms">bathrooms</label>
                <select v-model="bathrooms" class="form-select" id="bathrooms">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>

                </select>
            </div>

            <div class="col-md-3">
                <label for="storeys" class="form-label">storeys</label>
                <select v-model="storeys" class="form-select" id="storeys">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="col-md-3">
                <label for="garages" class="form-label">garages</label>
                <select v-model="garages" class="form-select" id="garages">
                    <option value="">-</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
            </div>

            <div class="submit">
                    <button @click.prevent="fetch" type="submit" class="btn btn-primary justify-content-end">
                        search
                    </button>
                </div>

        </form>
          <div v-if="busy" class="d-flex align-items-center p-lg-4">
            <strong>Loading...</strong>
            <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
        </div>

          <div class="m-3 " v-if="ms"> nothing found...</div>

        <div>
            <table class="table">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>price</th>
                    <th>bedrooms</th>
                    <th>bathrooms</th>
                    <th>storeys</th>
                    <th>garages</th>
                </tr>
                </thead>

<!--                @foreach($houses as $h)-->
                <tr v-for="h in houses">
                    <td>{{h.id}}</td>
                    <td>{{h.name}}</td>
                    <td>{{h.price}}</td>
                    <td>{{h.bedrooms}}</td>
                    <td>{{h.bathrooms}}</td>
                    <td>{{h.storeys}}</td>
                    <td>{{h.garages}}</td>
                </tr>
<!--                @endforeach-->

            </table>
        </div>
    </div>

</template>

<script>

export default {
    data(){
        return{
            name: '',
            price_min:'',
            price_max:'',
            bedrooms:'',
            bathrooms:'',
            storeys:'',
            garages:'',
            price:'',
            houses:[],
            busy:false,
            ms:false,
        }
    },
    methods:{

        fetch(){
            this.busy=true;

            axios.get(`/api/i`,{
                params:{
                    name: this.name,
                    min:this.price_min,
                    max:this.price_max,
                    bathrooms:this.bathrooms,
                    bedrooms: this.bedrooms,
                    storeys: this.storeys,
                    garages: this.garages,
                }
            })
                .then(response=>{
                    this.houses = response.data;
                    if ( response.data.length ===0 )
                        this.ms=true;
                    else
                        this.ms=false;
                    this.busy = false;
                })
        }
    },
       mounted() {
        this.fetch();
       }

}
</script>

<style scoped>

</style>
