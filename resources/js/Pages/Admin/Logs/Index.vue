<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";

defineProps(["logs"]);

</script>

<template>
	<AppLayout title="Logs Management">
		<template #header>
			<h2 class="font-semibold text-xl text-gray-800 leading-tight">
				Logs Management
			</h2>
		</template>

		<div class="py-12">
			<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
				<div
					class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5"
				>
                <!-- <div class="flex items-right mb-6">
					<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="`/admin/logs/create`"> Create Log </a>
                </div> -->
						<Table
							:resource="logs"
							name="logs"
							preserve-scroll="table-top"
						>
							<template #cell(actions)="{ item: log }">
								<a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" :href="`/admin/logs/${log.id}/edit`"> Show </a>
							</template>
						</Table>
				</div>
			</div>
		</div>
	</AppLayout>
</template>