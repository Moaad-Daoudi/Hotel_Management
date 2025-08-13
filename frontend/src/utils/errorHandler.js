export function handleApiError(error) {
  if (!error) return 'Unknown error occured'

  if (!error.response) {
    console.error('Network error', error)
    return 'Network error. Please check your connection'
  }

  const { status, data } = error.response

  switch (status) {
    case 400:
      return data.message || 'Bad request'
    case 401:
      return 'Unauthorized. Please log in again.'
    case 403:
      return 'You do not have permission to perform this action.'
    case 404:
      return 'Resource not found.'
    case 422:
      return data.errors ? formatValidationErrors(data.errors) : data.message
    case 500:
      return 'Server error. Try again later.'
    default:
      return data.message || 'Something went wrong.'
  }
}

function formatValidationErrors(errors) {
  return Object.values(errors).flat().join(' ')
}
