import api from '@/services/api';

class HousekeepingApiService {
    /**
     * Fetches rooms based on their status for housekeeping.
     * @param {object} filters - { cleaning_status, floor }
     * @returns {Promise<object>}
     */
    fetchRooms(filters) {
        // Logic: GET from '/api/back-office/housekeeping/room-statuses' with filters.
        return api.get('/back-office/housekeeping/room-statuses', { params: filters });
    }

    /**
     * Updates the cleaning status of a room.
     * @param {number} roomId
     * @param {string} newStatus - e.g., 'clean', 'inspected'
     * @returns {Promise<object>}
     */
    updateRoomCleaningStatus(roomId, newStatus) {
        // Logic: PUT to `/api/back-office/housekeeping/room-statuses/${roomId}` with { cleaning_status: newStatus }.
        return api.put(`/back-office/housekeeping/room-statuses/${roomId}`, { cleaning_status: newStatus });
    }

    /**
     * Fetches specific tasks assigned to the current user.
     * @returns {Promise<object>}
     */
    fetchMyTasks() {
        // Logic: GET from '/api/back-office/housekeeping/tasks'.
        return api.get('/back-office/housekeeping/tasks');
    }

    /**
     * Updates the status of a specific housekeeping task.
     * @param {number} taskId
     * @param {string} newStatus - e.g., 'in_progress', 'completed'
     * @returns {Promise<object>}
     */
    updateTaskStatus(taskId, newStatus) {
        // Logic: PUT to `/api/back-office/housekeeping/tasks/${taskId}` with { status: newStatus }.
        return api.put(`/back-office/housekeeping/tasks/${taskId}`, { status: newStatus });
    }
}

export default new HousekeepingApiService();
