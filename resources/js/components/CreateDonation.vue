<template>
<div class="mt-5">
    <form class="w-50 mx-auto">
            <p v-if="errors" class="text-danger"> {{ error }} </p>
        <div class="col-md-12">
            <select class="form-select mt-3" required v-model="form.campaignId">
                <option disabled value="">Campaign</option>
                <option v-for="campaign in campaigns" :key="campaign.id" :value="campaign.id">{{ campaign.title }}</option>
            </select>
            <div class="invalid-feedback">Please select a position!</div>
        </div>

        <div class="col-md-12 mt-3">
            <input class="form-control" type="text" name="donorName" placeholder="Donor Name " required v-model="form.donorName">
            <div class="invalid-feedback">Username field cannot be blank!</div>
        </div>



        <div class="col-md-12 mt-3">
            <input class="form-control" type="number" name="amount" placeholder="Amount" required v-model="form.amount">
            <div class="invalid-feedback">Password field cannot be blank!</div>
        </div>

        <div class="form-button mt-3">
            <button id="submit" type="submit" class="btn btn-primary" @click.prevent="saveData()">Register</button>
        </div>
    </form>


    <div class="mt-5 w-50 mx-auto" style="border: 2px solid gray">
            <table class="table">
                <thead>
                    <tr>
                        <th>N</th>
                        <th>Campaign</th>
                        <th>Donor Name</th>
                        <th>Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(donation, index) in donations" :key="donation.id">
                        <th>{{ index+1 }}</th>
                        <td>{{ donation.campaign.title }}</td>
                        <td>{{ donation.donorName }}</td>
                        <td>{{ donation.amount   }}</td>
                        <td><button @click="deleteDonation(donation.id)">Delete</button></td>
                    </tr>

                </tbody>
            </table>
    </div>

</div>
</template>

<script>

export default {
    data() {
        return {
            campaigns: [],
            donations: [],
            errors: null,
            form: {
                campaignId: "",
                donorName: "",
                amount: null
            },
        }
    },
    mounted() {
        this.getCampaigns(),
        this.getDonations()
    },

    methods: {
       async getCampaigns() {
            await this.axios.get('api/getCampaigns').then((res) => {
                this.campaigns = res.data
            }).catch(error => {
                console.log(error)
            })
        },

        saveData() {
            this.axios.post('api/saveDonation', this.form).then((res) => {
                // if (res.data.data.errors) {
                //     this.errors = res.data.data.errors
                // }
                console.log(res);
            }).catch(error => {
                console.log(error)

            });

            this.getDonations()
        },

        getDonations() {
            this.axios.get('api/getDonations').then((res) => {
                this.donations = res.data
                 console.log(this.donations);
            })
        },
        deleteDonation(id) {
            this.axios.delete(`api/deleteDonation/${id}`).then((res) => {
                console.log(id);
                this.getDonations()
             })
        }



    },
}

</script>

