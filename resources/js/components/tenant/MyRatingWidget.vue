<template>
    <el-card >
        <div class="myrate">How would you rate us?</div>
        <div class="text-center" >
            <el-rate v-model="data.rating" class="rate"></el-rate>
            <el-input
                class="review"
                type="textarea"
                :autosize="{ minRows: 2, maxRows: 3}"
                placeholder="Please input"
                v-model="data.review">
            </el-input>
            <el-button type="primary" class="text-center w100p sendbtn"  @click="sendclick">
                <v-icon left class="sendicon" small>mdi-send</v-icon> 
                {{$t('Send')}}
            </el-button>
        </div>
    </el-card>
</template>

<script>
import axios from '@/axios'
import {displaySuccess, displayError} from 'helpers/messages'

export default {
    data(){
        return{
            data:{
                tenant_id : "",
                review:"sss",
                rating:0,
            }
        }
    },
    created(){
        this.data.tenant_id = this.$store.getters.loggedInUser.tenant.id;
        this.data.review = this.$store.getters.loggedInUser.tenant.review;
        this.data.rating = this.$store.getters.loggedInUser.tenant.rating;
    },
    methods: {
        sendclick(){
            axios.post('addReview', this.data).then(res =>{
                displaySuccess(res)
            })
        }
    },

}
</script>

<style>
    
</style>
