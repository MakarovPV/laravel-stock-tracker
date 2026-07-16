export {calculatePercentageChange, renderBalance}

function calculatePercentageChange(first, last)
{
    if (first === 0) {
        return null
    }

    return ((last - first) / first) * 100
}

function renderBalance(elementId, percentage)
{
    const element = document.querySelector(elementId)

    if (!element) {
        return
    }

    element.classList.remove('text-success', 'text-danger', 'text-secondary')

    if (percentage === null || !Number.isFinite(percentage)) {
        element.classList.add('text-secondary')
        element.textContent = '–'
        return
    }

    const isPositive = percentage > 0
    const isNegative = percentage < 0
    const className = isPositive ? 'text-success' : (isNegative ? 'text-danger' : 'text-secondary')
    const arrow = isPositive ? '▲' : (isNegative ? '▼' : '–')

    element.classList.add(className)
    element.textContent = `${arrow}${Math.abs(percentage).toFixed(1)}%`
}
