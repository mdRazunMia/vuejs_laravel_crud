<template>
    <div class="container p-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr class="text-center">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <template v-for="employee in employees" :key="employee.id">
                    <tr class="text-center">
                        <td>{{ employee.name }}</td>
                        <td>{{ employee.email }}</td>
                        <td>{{ employee.phone }}</td>
                        <td>
                            <a href="" class="btn btn-info">Edit</a>
                            <button type="button" class="btn btn-danger" @click="deleteEmployees(employee.id)">
                                Delete {{ employee.id }}
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import { ref, onMounted } from "vue";
import axios from "axios";

export default {
    setup() {
        const employees = ref([]);
        const getEmployees = async () => {
            let res = await axios.get(
                "http://localhost:8000/api/all-employees"
            );
            employees.value = res.data;
        };

        const deleteEmployees = async ($id) => {
            await axios.delete("http://localhost:8000/api/delete-employee/" + $id);
            getEmployees()
        };

        onMounted(getEmployees);

        return {
            employees: employees,
            deleteEmployees,
        };
    },
};
</script>
