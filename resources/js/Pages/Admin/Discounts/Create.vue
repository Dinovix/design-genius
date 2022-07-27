<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

defineProps(["discounts"]);
</script>

<template>
	<AppLayout title="Discounts Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Discounts Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head title="Create Discounts" />
						<h1 class="mb-8 text-3xl font-bold">
							<Link
								class="text-indigo-400 hover:text-indigo-600"
								href="/admin/discounts"
								>Discounts</Link
							>
							<span class="text-indigo-400 font-medium">/</span>
							Create
						</h1>
						<div
							class="max-w-3xl bg-white rounded-md shadow overflow-hidden"
						>
							<form @submit.prevent="store">
								<div class="flex flex-wrap -mb-8 -mr-6 p-8">
									<text-input
										v-model="form.name"
										:error="form.errors.name"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Name"
									/>
									<textarea-input
										v-model="form.description"
										:error="form.errors.description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Description"
									/>
                                    <text-input
										v-model="form.percentage"
										:error="form.errors.percentage"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Percentage"
                                        type="number"
									/>
                                    <text-input
										v-model="form.exp_date"
										:error="form.errors.exp_date"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Expiration Date"
                                        type="date"
									/>
                                    <select-input
										v-model="form.active"
										:error="form.errors.active"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Active"
									>
                                        <option :value="null" />
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select-input>

									<select-input
										v-model="form.is_for_rent"
										:error="form.errors.is_for_rent"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Enabled For Rent"
									>
                                        <option :value="null" />
										<option value="0">No</option>
										<option value="1">Yes</option>
									</select-input>
									
								</div>
								<div
									class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<loading-button
										:loading="form.processing"
										class="btn-indigo"
										type="submit"
										>Create Discount</loading-button
									>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</AppLayout>
</template>

<script>
import { Head, Link } from "@inertiajs/inertia-vue3";
import TextareaInput from "@/Shared/TextareaInput";
import TextInput from "@/Shared/TextInput";
import LoadingButton from "@/Shared/LoadingButton";
import SelectInput from "@/Shared/SelectInput";

export default {
	components: {
		Head,
		Link,
		LoadingButton,
		TextareaInput,
		TextInput,
		SelectInput
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				name: "",
				description: "",
				percentage: "",
				is_for_rent: null,
				active: null,
				exp_date: null
			}),
		};
	},
	methods: {
		store() {
			this.form.post("/admin/discounts");
		},
	},
};
</script>
