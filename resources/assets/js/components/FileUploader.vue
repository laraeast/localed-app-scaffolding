<template>
    <div>
        <label>{{ label }}</label>
        <div class="custom-uploader">
            <div class="uploader-item" v-for="file in files">
                <img :src="file.url">
                <input type="hidden" v-if="file.base64" :name="name" :value="file.url">
                <a href="javascript:;"
                   @click="deleteBase64(file)"
                   :title="delete_title"
                   v-if="file.base64"
                   class="delete"
                >
                    <i class="fa fa-trash fa-trash-alt"></i>
                </a>

                <a href="javascript:;"
                   @click="deleteHttp(file)"
                   :title="delete_title"
                   v-if="file.links && file.links.delete"
                   class="delete"
                >
                    <i class="fa fa-trash fa-trash-alt"></i>
                </a>
            </div>
            <div class="uploader-item" v-if="files.length < this.max">
                <label :for="id">
                    <i class="fa fa-plus-circle"></i>
                    <input type="file" @change="readUrl($event.target)" :id="id" multiple>
                </label>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            label: {
                type: String,
                required: true,
            },
            name: {
                type: String,
                required: true,
            },
            delete_title: {
                type: String,
                required: false,
                default: 'Delete',
            },
            media: {
                type: String,
                required: false,
                default: '[]'
            },
            max: {
                default: 20
            },
            id: {
                type: String,
                required: false,
                default: 'upload'
            }
        },
        data() {
            return {
                files: [],
            }
        },
        created() {
            this.files = JSON.parse(this.media);
        },
        methods: {
            readUrl: function (input) {
                if (input.files) {
                    var filesAmount = input.files.length;

                    for (let i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();

                        reader.onload = (event) => {
                            if ((i + this.files.length) <= parseInt(this.max)) {
                                this.files.push({
                                    url: event.target.result,
                                    base64: true
                                });
                            }

                            input.value = '';
                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }
            },
            deleteBase64: function (file) {
                this.$delete(this.files, this.files.indexOf(file));
            },
            deleteHttp: function (file) {
                if (file.base64) {
                    return;
                }
                axios.delete(file.links.delete.href).then((response) => {
                    this.$delete(this.files, this.files.indexOf(file));
                });
            }
        }
    }
</script>
<style>
    .custom-uploader {
        padding: 15px 0;
        display: flex;
        flex-wrap: wrap;
    }

    .custom-uploader .uploader-item {
        float: right;
        margin: 0 5px 5px 0px;
        width: 100px;
        height: 80px;
        position: relative;
    }
    .custom-uploader .uploader-item .delete {
        background: #ff0000;
        color: #fff;
        position: absolute;
        bottom: 0;
        left: 0;
        padding: 2px;
    }
    .custom-uploader .uploader-item label {
        border: 2px dashed #848484;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        flex-direction: column;
        text-align: center;
        cursor: pointer;
    }

    .custom-uploader .uploader-item img {
        width: 100%;
        height: 100%;
        margin: 0 0 0 1px;
    }

    .custom-uploader label i {
        color: #848484;
        font-size: 15pt;
    }

    .custom-uploader input {
        display: none;
    }
</style>
