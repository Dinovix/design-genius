<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

defineProps(["categories", "discounts"]);
</script>

<template>
	<AppLayout title="Products Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Products Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
					<div>
						<Head title="Create Products" />
						<h1 class="mb-8 text-3xl font-bold">
							<Link
								class="text-slate-400 hover:text-slate-600"
								href="/admin/products"
								>Products</Link
							>
							<span class="text-slate-400 font-medium">/</span>
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
									<select-input
										v-model="form.category_id"
										:error="form.errors.category_id"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Product Category"
									>
										<option :value="null" ></option>
										<option v-for="category in categories" :value="category.id" v-bind:key="category.id+'-cat'">{{ category.name }}</option>
									</select-input>
                                    <select-input
										v-model="form.discount_id"
										:error="form.errors.discount_id"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Discount"
									>
										<option :value="null" ></option>
										<option v-for="discount in discounts" :value="discount.id" v-bind:key="discount.id+'-cat'">{{ discount.name }}</option>
									</select-input>
									<text-input
										v-model="form.sale_price"
										:error="form.errors.sale_price"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Sale Price"
                                        type="number"
									/>
                                    <select-input
										v-model="form.is_rentable"
										:error="form.errors.is_rentable"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Rentable"
									>
										<option :value="null" />
										<option value="0">NO</option>
										<option value="1">YES</option>
									</select-input>
									<text-input
										v-model="form.rent_price"
										:error="form.errors.rent_price"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        type="number"
										label="Rent Price"
									/>
                                    <text-input
										v-model="form.weight"
										:error="form.errors.weight"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        type="number"
										label="Weight(Kg)"
									/>
									<text-input
										v-model="form.available_colors"
										:error="form.errors.available_colors"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Available Colors"
									/>
                                    <textarea-input
										v-model="form.cart_description"
										:error="form.errors.cart_description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Cart Description"
									/>
                                    <textarea-input
										v-model="form.short_description"
										:error="form.errors.short_description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Short Description"
									/>
                                    <textarea-input
										v-model="form.long_description"
										:error="form.errors.long_description"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Long Description"
									/>
                                    <textarea-input
										v-model="form.features"
										:error="form.errors.features"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Features"
									/>
                                    <text-input
										v-model="form.quantity"
										:error="form.errors.quantity"
										class="pb-8 pr-6 w-full lg:w-1/2"
                                        type="number"
										label="Quantity"
									/>
                                    <text-input
										v-model="form.location"
										:error="form.errors.location"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Location"
									/>
									<select-input
										v-model="form.active"
										:error="form.errors.active"
										class="pb-8 pr-6 w-full lg:w-1/2"
										label="Is Visible"
									>
										<option :value="false">No</option>
										<option :value="true">Yes</option>
									</select-input>
									<file-input
										v-model="form.thumbnail"
										:error="form.errors.thumbnail"
										class="pb-8 pr-6 w-full lg:w-1/2"
										type="file"
										accept="image/*"
										label="Product Image"
									/>
								</div>
								<div
									class="flex items-center justify-end px-8 py-4 bg-gray-50 border-t border-gray-100"
								>
									<loading-button
										:loading="form.processing"
										class="btn-slate"
										type="submit"
										>Create Product</loading-button
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
import FileInput from "@/Shared/FileInput";
import TextInput from "@/Shared/TextInput";
import TextareaInput from "@/Shared/TextareaInput";
import SelectInput from "@/Shared/SelectInput";
import LoadingButton from "@/Shared/LoadingButton";

export default {
	components: {
		FileInput,
		Head,
		Link,
		LoadingButton,
		SelectInput,
		TextInput,
        TextareaInput
	},
	remember: "form",
	data() {
		return {
			form: this.$inertia.form({
				name: "",
				category_id: null,
				discount_id: null,
				sale_price: null,
				is_rentable: null,
				rent_price: null,
				weight: null,
				available_colors: "",
				cart_description: "",
				short_description: "",
				long_description: "",
				features: "",
				quantity: null,
				location: "",
				active: null,
				thumbnail: null,
			}),
		};
	},
	methods: {
		store() {
			this.form.post("/admin/products");
		},
	},
};
</script>
