<template>
    <a-card
            hoverable
            style='width: 100%'
            :loading='loading'
    >
        <a-form
                :model='tests'
                :label-col='labelCol'
                :wrapper-col='wrapperCol'
                :rules='rules'
        >
            <a-form-item
                    label='tests title'
                    v-bind='validationErrors.title'
            >
                <a-input
                        v-model:value='tests.title'
                />
            </a-form-item>
            <a-form-item
                    label='Author'
                    v-bind='validationErrors.author'
            >
                <a-input
                        v-model:value='tests.author'
                />
            </a-form-item>
            <a-form-item
                    label='IBAN'
                    v-bind='validationErrors.iban'
            >
                <a-input
                        v-model:value='tests.iban'
                />
            </a-form-item>
            <a-form-item
                    label='Release Year'
                    v-bind='validationErrors.release_year'
            >
                <a-input
                        v-model:value='tests.release_year'
                />
            </a-form-item>
            <a-form-item
                    label='Cover Image URL'
                    v-bind='validationErrors.cover_image'
            >
                <a-input
                        v-model:value='tests.cover_image'
                />
            </a-form-item>
            <a-form-item
                    :wrapper-col='{ span: 14, offset: 4 }'
            >
                <a-button
                        size='large'
                        type='primary'
                        @click='handleSubmit'
                >
                    {{ isEdit ? 'Update' : 'Create' }}
                </a-button>
                <a-button
                        size='large'
                        style='margin-left: 10px'
                        @click='resetFields'
                        v-if='!isEdit'
                >
                    Reset
                </a-button>
                <a-button
                        size='large'
                        style='margin-left: 10px'
                        @click='showAlltestss'
                        danger
                >
                    Cancel
                </a-button>
            </a-form-item>
        </a-form>
    </a-card>
</template>
<script>
import api from '../api';
import {Form} from 'ant-design-vue';
import {reactive} from 'vue';
import {useRouter} from 'vue-router'

const {useForm} = Form;

export default {

    setup(props) {
        let tests = reactive({
            title: '',
            author: '',
            iban: '',
            release_year: '',
            cover_image: '',
        });

        const rules = reactive({
            title: [
                {
                    required: true,
                    message: 'Please provide tests title',
                    trigger: 'blur'
                },
            ],
            author: [
                {
                    required: true,
                    message: 'Please provide tests author',
                    trigger: 'blur'
                },
            ],
            iban: [
                {
                    required: true,
                    message: 'Please provide tests IBAN',
                    trigger: 'blur'
                },
            ],
            release_year: [
                {
                    required: true,
                    message: 'Please provide tests release year',
                    trigger: 'blur'
                },
                {
                    length: 4,
                    message: 'Length should be 4',
                    trigger: 'blur'
                },
            ],
            cover_image: [
                {
                    required: true,
                    message: 'Please provide url for tests cover image',
                    trigger: 'blur'
                },
            ],
        });

        const {
            resetFields,
            validate,
            validateInfos: validationErrors
        } = useForm(tests, rules);

        const router = useRouter();

        const handleSubmit = () => {
            validate()
                .then(
                    async () => {
                        const {testsId} = props;
                        const updatedtests = !!testsId ?
                            await api.helpPatch(`testss/${testsId}`, tests) :
                            await api.helpPost('testss', tests);
                        Object.assign(tests, updatedtests);
                        router.push({name: 'tests-item', params: {testsId: tests.id}});
                    }
                )
                .catch(() => {
                });
        }

        return {
            resetFields,
            validationErrors,
            tests,
            handleSubmit,
            rules
        };
    },
    props: ['testsId'],
    data() {
        return {
            isEdit: !!this.testsId,
            loading: !!this.testsId,
            labelCol: {span: 4},
            wrapperCol: {span: 14},
        }
    },
    methods: {
        async loadtests() {
            Object.assign(this.tests, await api.helpGet(`testss/${this.testsId}`));
            this.loading = false;
        },
        showAlltestss() {
            this.$router.push({name: 'testss'});
        },
    },
    async mounted() {
        if (this.isEdit) {
            await this.loadtests();
        }
    }
};
</script>
