

<script setup>
import { useToast } from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';
import { onMounted, reactive, ref } from 'vue';

const $toast = useToast();
const pays = [
    { "code": "AF", "name": "Afghanistan" },
    { "code": "AX", "name": "Åland Islands" },
    { "code": "AL", "name": "Albania" },
    { "code": "DZ", "name": "Algeria" },
    { "code": "AS", "name": "American Samoa" },
    { "code": "AD", "name": "Andorra" },
    { "code": "AO", "name": "Angola" },
    { "code": "AI", "name": "Anguilla" },
    { "code": "AQ", "name": "Antarctica" },
    { "code": "AG", "name": "Antigua and Barbuda" },
    { "code": "AR", "name": "Argentina" },
    { "code": "AM", "name": "Armenia" },
    { "code": "AW", "name": "Aruba" },
    { "code": "AU", "name": "Australia" },
    { "code": "AT", "name": "Austria" },
    { "code": "AZ", "name": "Azerbaijan" },
    { "code": "BS", "name": "Bahamas" },
    { "code": "BH", "name": "Bahrain" },
    { "code": "BD", "name": "Bangladesh" },
    { "code": "BB", "name": "Barbados" },
    { "code": "BY", "name": "Belarus" },
    { "code": "BE", "name": "Belgium" },
    { "code": "BZ", "name": "Belize" },
    { "code": "BJ", "name": "Benin" },
    { "code": "BM", "name": "Bermuda" },
    { "code": "BT", "name": "Bhutan" },
    { "code": "BO", "name": "Bolivia" },
    { "code": "BA", "name": "Bosnia and Herzegovina" },
    { "code": "BW", "name": "Botswana" },
    { "code": "BV", "name": "Bouvet Island" },
    { "code": "BR", "name": "Brazil" },
    { "code": "IO", "name": "British Indian Ocean Territory" },
    { "code": "BN", "name": "Brunei Darussalam" },
    { "code": "BG", "name": "Bulgaria" },
    { "code": "BF", "name": "Burkina Faso" },
    { "code": "BI", "name": "Burundi" },
    { "code": "KH", "name": "Cambodia" },
    { "code": "CM", "name": "Cameroon" },
    { "code": "CA", "name": "Canada" },
    { "code": "CV", "name": "Cape Verde" },
    { "code": "KY", "name": "Cayman Islands" },
    { "code": "CF", "name": "Central African Republic" },
    { "code": "TD", "name": "Chad" },
    { "code": "CL", "name": "Chile" },
    { "code": "CN", "name": "China" },
    { "code": "CX", "name": "Christmas Island" },
    { "code": "CC", "name": "Cocos (Keeling) Islands" },
    { "code": "CO", "name": "Colombia" },
    { "code": "KM", "name": "Comoros" },
    { "code": "CG", "name": "Congo" },
    { "code": "CD", "name": "Congo, Democratic Republic of the" },
    { "code": "CK", "name": "Cook Islands" },
    { "code": "CR", "name": "Costa Rica" },
    { "code": "CI", "name": "Côte d'Ivoire" },
    { "code": "HR", "name": "Croatia" },
    { "code": "CU", "name": "Cuba" },
    { "code": "CY", "name": "Cyprus" },
    { "code": "CZ", "name": "Czech Republic" },
    { "code": "DK", "name": "Denmark" },
    { "code": "DJ", "name": "Djibouti" },
    { "code": "DM", "name": "Dominica" },
    { "code": "DO", "name": "Dominican Republic" },
    { "code": "EC", "name": "Ecuador" },
    { "code": "EG", "name": "Egypt" },
    { "code": "SV", "name": "El Salvador" },
    { "code": "GQ", "name": "Equatorial Guinea" },
    { "code": "ER", "name": "Eritrea" },
    { "code": "EE", "name": "Estonia" },
    { "code": "ET", "name": "Ethiopia" },
    { "code": "FK", "name": "Falkland Islands (Malvinas)" },
    { "code": "FO", "name": "Faroe Islands" },
    { "code": "FJ", "name": "Fiji" },
    { "code": "FI", "name": "Finland" },
    { "code": "FR", "name": "France" },
    { "code": "GF", "name": "French Guiana" },
    { "code": "PF", "name": "French Polynesia" },
    { "code": "TF", "name": "French Southern Territories" },
    { "code": "GA", "name": "Gabon" },
    { "code": "GM", "name": "Gambia" },
    { "code": "GE", "name": "Georgia" },
    { "code": "DE", "name": "Germany" },
    { "code": "GH", "name": "Ghana" },
    { "code": "GI", "name": "Gibraltar" },
    { "code": "GR", "name": "Greece" },
    { "code": "GL", "name": "Greenland" },
    { "code": "GD", "name": "Grenada" },
    { "code": "GP", "name": "Guadeloupe" },
    { "code": "GU", "name": "Guam" },
    { "code": "GT", "name": "Guatemala" },
    { "code": "GG", "name": "Guernsey" },
    { "code": "GN", "name": "Guinea" },
    { "code": "GW", "name": "Guinea-Bissau" },
    { "code": "GY", "name": "Guyana" },
    { "code": "HT", "name": "Haiti" },
    { "code": "HM", "name": "Heard Island and McDonald Islands" },
    { "code": "VA", "name": "Holy See (Vatican City State)" },
    { "code": "HN", "name": "Honduras" },
    { "code": "HK", "name": "Hong Kong" },
    { "code": "HU", "name": "Hungary" },
    { "code": "IS", "name": "Iceland" },
    { "code": "IN", "name": "India" },
    { "code": "ID", "name": "Indonesia" },
    { "code": "IR", "name": "Iran, Islamic Republic of" },
    { "code": "IQ", "name": "Iraq" },
    { "code": "IE", "name": "Ireland" },
    { "code": "IM", "name": "Isle of Man" },
    { "code": "IL", "name": "Israel" },
    { "code": "IT", "name": "Italy" },
    { "code": "JM", "name": "Jamaica" },
    { "code": "JP", "name": "Japan" },
    { "code": "JE", "name": "Jersey" },
    { "code": "JO", "name": "Jordan" },
    { "code": "KZ", "name": "Kazakhstan" },
    { "code": "KE", "name": "Kenya" },
    { "code": "KI", "name": "Kiribati" },
    { "code": "KP", "name": "Korea, Democratic People's Republic of" },
    { "code": "KR", "name": "Korea, Republic of" },
    { "code": "KW", "name": "Kuwait" },
    { "code": "KG", "name": "Kyrgyzstan" },
    { "code": "LA", "name": "Lao People's Democratic Republic" },
    { "code": "LV", "name": "Latvia" },
    { "code": "LB", "name": "Lebanon" },
    { "code": "LS", "name": "Lesotho" },
    { "code": "LR", "name": "Liberia" },
    { "code": "LY", "name": "Libya" },
    { "code": "LI", "name": "Liechtenstein" },
    { "code": "LT", "name": "Lithuania" },
    { "code": "LU", "name": "Luxembourg" },
    { "code": "MO", "name": "Macao" },
    { "code": "MK", "name": "Macedonia, the Former Yugoslav Republic of" },
    { "code": "MG", "name": "Madagascar" },
    { "code": "MW", "name": "Malawi" },
    { "code": "MY", "name": "Malaysia" },
    { "code": "MV", "name": "Maldives" },
    { "code": "ML", "name": "Mali" },
    { "code": "MT", "name": "Malta" },
    { "code": "MH", "name": "Marshall Islands" },
    { "code": "MQ", "name": "Martinique" },
    { "code": "MR", "name": "Mauritania" },
    { "code": "MU", "name": "Mauritius" },
    { "code": "YT", "name": "Mayotte" },
    { "code": "MX", "name": "Mexico" },
    { "code": "FM", "name": "Micronesia, Federated States of" },
    { "code": "MD", "name": "Moldova, Republic of" },
    { "code": "MC", "name": "Monaco" },
    { "code": "MN", "name": "Mongolia" },
    { "code": "ME", "name": "Montenegro" },
    { "code": "MS", "name": "Montserrat" },
    { "code": "MA", "name": "Morocco" },
    { "code": "MZ", "name": "Mozambique" },
    { "code": "MM", "name": "Myanmar" },
    { "code": "NA", "name": "Namibia" },
    { "code": "NR", "name": "Nauru" },
    { "code": "NP", "name": "Nepal" },
    { "code": "NL", "name": "Netherlands" },
    { "code": "NC", "name": "New Caledonia" },
    { "code": "NZ", "name": "New Zealand" },
    { "code": "NI", "name": "Nicaragua" },
    { "code": "NE", "name": "Niger" },
    { "code": "NG", "name": "Nigeria" },
    { "code": "NU", "name": "Niue" },
    { "code": "NF", "name": "Norfolk Island" },
    { "code": "MP", "name": "Northern Mariana Islands" },
    { "code": "NO", "name": "Norway" },
    { "code": "OM", "name": "Oman" },
    { "code": "PK", "name": "Pakistan" },
    { "code": "PW", "name": "Palau" },
    { "code": "PS", "name": "Palestinian Territory, Occupied" },
    { "code": "PA", "name": "Panama" },
    { "code": "PG", "name": "Papua New Guinea" }];


const listeUser = ref([])

const isloading=ref(false)
    const dataForm=reactive({
    "nom":"",
    "prenoms":"",
    "pays":"",
    "ville":"",
    "email":"",
    "telephone":"",
    "whatsapp":"",
    "file":"",
    });



const onUpload = (event) => {
    let files;
    if (event.type === "drop") {
        files = event.dataTransfer.files
    } else if (event.type === "change") {
        files = event.target.files
    }
    if (files) {
        for (const element of files) {

            dataForm.file = element
        }
    }
};


const getListe = async () => {

    window.axios.get(`/api/user/read-all`)
        .then(response => {
            listeUser.value = response.data
        })
        .catch(error => {

            console.error(error);
        })
        .finally(() => {
        })
        ;
}

const saveUser = async (item) => {

    let formData = new FormData();
    isloading.value = true;
    for (const key in item) {
        if (Object.hasOwnProperty.call(item, key)) {
            const element = item[ key ];
            formData.append(key, element)
        }
    }

    window.axios.post(`/api/user/create`, formData,{
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        })
        .then(async(response) => {
            await getListe();

            $toast.success('opération effetuée avec succès');
        })
        .catch(error => {

            console.error(error);
        })
        .finally(() => {
            isloading.value = false
        })
        ;
};

onMounted(() => {

    getListe()
});
</script>



<template>
    <div>
        <div class="container-full ">
            <div class="header">
                <button type="button" class="btn btn-primary bg-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Nouveau
                </button>
            </div>
            <div class="contenttable">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Prenoms</th>
                            <th scope="col">pays</th>
                            <th scope="col">ville</th>
                            <th scope="col">email</th>
                            <th scope="col">telephone</th>
                            <th scope="col">whatsapp</th>
                            <th scope="col">Cv</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr v-for="(item, index) in listeUser?.data" :key="index">
                            <th scope="row">{{ item?.id }}</th>
                            <td>{{ item?.nom }}</td>
                            <td>{{ item?.prenoms }}</td>
                            <td>{{ item?.pays }}</td>
                            <td>{{ item?.ville }}</td>
                            <td>{{ item?.email }}</td>
                            <td>{{ item?.telephone }}</td>
                            <td>{{ item?.whatsapp }}</td>
                            <td>
                                <a :href="item?.cv_path" target="_blank">Ouvrir le PDF</a>
                                <!-- <a href="#">file cv {{ item?.cv_path }}</a> -->
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>


        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ajouter un utilisateur</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" @submit.prevent="saveUser(dataForm)">

                        <div class="modal-body">

                            <div class="rows">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nom</label>
                                    <input type="text" class="form-control" v-model="dataForm.nom"
                                        id="exampleFormControlInput1" placeholder="Nom">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Prenoms</label>
                                    <input type="text" v-model="dataForm.prenoms" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Prenoms">
                                </div>
                            </div>
                            <div class="rows">
                                <div class="mb-3 col">
                                    <label for="exampleFormControlInput1" class="form-label">Pays</label>

                                    <select class="form-select" v-model="dataForm.pays"
                                        aria-label="Default select example">
                                        <option :value="item?.name" v-for="(item, index) in pays" :key="index">{{
                                            item?.name }}</option>
                                    </select>

                                    <!-- <input type="text" class="form-control" id="exampleFormControlInput1"
                                        v-model="dataForm.pays" placeholder="pays"> -->
                                </div>
                                <div class="mb-3 col">
                                    <label for="exampleFormControlInput1" class="form-label">Ville</label>
                                    <input type="text" v-model="dataForm.ville" class="form-control"
                                        id="exampleFormControlInput1" placeholder="ville">
                                </div>
                            </div>
                            <div class="rows">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="email" v-model="dataForm.email" class="form-control"
                                        id="exampleFormControlInput1" placeholder="email">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Téléphone</label>
                                    <input type="text" class="form-control" v-model="dataForm.telephone"
                                        id="exampleFormControlInput1" placeholder="telephone">
                                </div>
                            </div>
                            <div class="rows">
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Whatsapp</label>
                                    <input type="text" v-model="dataForm.whatsapp" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Whatsapp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Upload Cv</label>
                                    <input type="file" @change="(event) => onUpload(event)" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Upload Cv">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary bg-secondary"
                                data-bs-dismiss="modal">Annuler</button>
                            <div class="spinner-border" role="status" v-if="isloading">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                            <button type="submit" class="btn btn-primary bg-primary" v-else>Enregistrer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
$text: #011210;
// $text: #011210;
$text_ligth: #011311cc;
$background: #f3fffd;
$primary: #f83333;
$secondary: #155dee;
// $secondary: #1d9bf0;

$secondary_light: rgba(130, 138, 250, 0.3);
$accent: #011210;
// $accent: #7e3ef9;
$treeth: #F3F3F3;
// $treeth:#f7f7f7;

// $treeth:#f1f3f5;
// $treeth:#f5f5f5;
$white: #fff;
$gray :#ccc;
$gray_secondary: #ced4da;
$yellow :yellow;
$red :red;
$shadow_primary: 0px 0px 10em rgba(0, 0, 0, 0.05);
$shadow_secondary: 0px 0px 1px $gray;
// black 03090f
// violet 03182ff2
.rows{
    display: flex;
    gap: 1rem ;
    align-items: center;
}

.container-full{
    padding: 2rem;
    background-color: $treeth;
}
.contenttable{
    background-color: $white;
    padding: 1rem;
    border-radius: 1rem;
    margin-top: 2rem;
}
table {
    width: 100%;
    border-collapse: collapse;
    justify-content: space-between;
    margin-top: 2rem;
    thead {
        th {
            padding: 10px;
            font-size: 12px;
            text-align: left;
            color: $text_ligth;
            border-bottom: 1px solid $gray;
            // border-bottom: 1px solid $grey;
        }

    }

    tr {
        cursor: pointer;
        border-bottom: 1px solid $gray;
        width: 100%;

        &:hover {
            // background: $light_second;
        }

        td {
            padding: 15px;
            font-size: 14px;
            text-transform: lowercase;
            text-align: left;
            font-weight: 400;
            // width: calc(100% / 9);

            &.id {
                text-transform: uppercase;

            }

            &.action {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                gap: 5px;
                width: 100%;

                span {
                    a {
                        color: $white;
                    }

                    cursor: pointer;
                    padding: 4px;
                    background-color: $accent;
                    color: $white;
                    border-radius: 6px;

                    i {
                        width: 20px;
                        height: 20px;
                        line-height: 40px;
                        text-align: center;
                        border-radius: 50%;
                        font-weight: 900;
                        font-size: 0.9em;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        padding: 10px;
                    }
                }
            }

            .commande {
                text-decoration: underline;
                // color: $black;
            }



        }
    }

}
</style>
