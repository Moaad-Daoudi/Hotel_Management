import api from '@/services/api';

class MaintenanceApiService {
    /**
     * Fetches maintenance requests.
     * @param {object} filters - { status, priority, page }
     * @returns {Promise<object>}
     */
    fetchRequests(filters) {
        // Logic: GET from '/api/back-office/maintenance/requests' with filters.
        return api.get('/api/back-office/maintenance/requests', { params: filters });
    }

    /**
     * Updates a maintenance request (e.g., assign a user, change status).
     * @param {number} requestId
     * @param {object} updateData - { status, assigned_to, resolution_notes }
     * @returns {Promise<object>}
     */
    updateRequest(requestId, updateData) {
        // Logic: PUT to `/api/back-office/maintenance/requests/${requestId}` with updateData.
        return api.put(`/api/back-office/maintenance/requests/${requestId}`, updateData);
    }
}

export default new MaintenanceApiService();
