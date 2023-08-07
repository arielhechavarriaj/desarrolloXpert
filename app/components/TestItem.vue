<template>
    <a-spin
            tip='Loading test'
            v-if='test === null'
    >
    </a-spin>
    <a-card
            hoverable
            style='width: 60%'
            v-else
    >
        <template #cover>
            <img
                    alt='example'
                    :src='test.cover_image'
            />
        </template>
        <template
                class='ant-card-actions'
                #actions
        >
            <a-button
                    @click='showAlltests'
                    type='primary'
                    style='margin-right: 5px'
                    ghost
            >
                Home
            </a-button>
            <a-button
                    @click='showEdittestForm'
                    style='margin-right: 5px'
            >
                Edit
            </a-button>
            <a-popconfirm
                    title='Delete test? This action cannot be undone'
                    @confirm='deletetest'
                    okText='Delete'
                    okType='danger'
            >
                <template #icon>
                    <WarningOutlined style='color: red'/>
                </template>
                <a-button danger>
                    Delete
                </a-button>
            </a-popconfirm>
        </template>
        <a-card-meta
                :title='test.title'
                :description='`test by ${test.author}`'
        >
            <template #avatar>
                <a-avatar
                        src='<https://zos.alipayobjects.com/rmsportal/ODTLcjxAfvqbxHnVXCYX.png>'
                />
            </template>
        </a-card-meta>
        <a-row style='margin-top: 50px'>
            <a-col :span='6'>
                <a-statistic
                        title='Release Year'
                        groupSeparator=''
                        :value='test.release_year'
                        style='margin-right: 50px'
                />
            </a-col>
            <a-col :span='18'>
                <a-statistic
                        title='IBAN'
                        :value='test.iban'
                        groupSeparator=''
                />
            </a-col>
        </a-row>
    </a-card>
</template>
<script>
import api from '../api';
import {
    EditOutlined,
    ArrowLeftOutlined,
    WarningOutlined,
    DeleteOutlined
} from '@ant-design/icons-vue';

export default {
    props: ['testId'],
    data() {
        return {
            test: null
        }
    },
    components: {
        EditOutlined,
        ArrowLeftOutlined,
        WarningOutlined,
        DeleteOutlined
    },
    methods: {
        async loadtest() {
            this.test = await api.helpGet(`tests/${this.testId}`);
        },
        showAlltests() {
            this.$router.push({name: 'tests'});
        },
        showEdittestForm() {
            this.$router.push({name: 'test-form', params: {testId: this.testId}});
        },
        async deletetest() {
            await api.helpDelete(`tests/${this.testId}`);
            this.showAlltests();
        }
    },
    async mounted() {
        await this.loadtest();
    }
};
</script>
