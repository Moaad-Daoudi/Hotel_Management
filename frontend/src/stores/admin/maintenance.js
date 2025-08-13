import { defineStore } from 'pinia';
// import MaintenanceApiService from '@/services/Admin/MaintenanceApiService';

export const useAdminMaintenanceStore = defineStore('adminMaintenance', {
    state: () => ({
        requests: [],
        pagination: {},
        isLoading: false,
    }),
    actions: {
        // async loadRequests(filters) {
            // Logic:
            // 1. Set `this.isLoading = true;`.
            // 2. Call `MaintenanceApiService.fetchRequests(filters)`.
            // 3. Commit response to `this.requests` and `this.pagination`.
            // 4. In `finally`, set `this.isLoading = false;`.
        // },
    }
});
