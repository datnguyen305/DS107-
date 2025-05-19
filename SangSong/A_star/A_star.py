import heapq

def is_valid(state):
    F, C, G, B = state
    # Nếu không cùng bờ với farmer
    if F != G and (G == C or G == B):
        return False
    return True

def get_neighbors(state):
    F, C, G, B = state
    side = F  # Farmer's current side
    next_side = 'R' if side == 'L' else 'L'
    neighbors = []

    # Farmer đi một mình
    new_state = (next_side, C, G, B) if F == side else state
    if is_valid(new_state):
        neighbors.append(new_state)

    # Farmer chở từng vật
    for i, entity in enumerate([C, G, B]):
        if entity == side:
            new_state = list(state)
            new_state[0] = next_side  # Move Farmer
            new_state[i+1] = next_side  # Move entity
            new_state = tuple(new_state)
            if is_valid(new_state):
                neighbors.append(new_state)

    return neighbors

def heuristic(state):
    # Đếm số đối tượng chưa sang phải
    return sum(1 for x in state if x != 'R')

def a_star(start, goal):
    heap = []
    heapq.heappush(heap, (heuristic(start), 0, start, []))
    visited = set()

    while heap:
        est_total, cost, current, path = heapq.heappop(heap)
        if current in visited:
            continue
        visited.add(current)
        path = path + [current]

        if current == goal:
            return path

        for neighbor in get_neighbors(current):
            if neighbor not in visited:
                heapq.heappush(heap, (
                    cost + 1 + heuristic(neighbor),
                    cost + 1,
                    neighbor,
                    path
                ))

    return None

def main():
    start = ('L', 'L', 'L', 'L')
    goal = ('R', 'R', 'R', 'R')
    path = a_star(start, goal)

    if path:
        print("Path found:")
        for step in path:
            print(step)
    else:
        print("No solution found.")

main()

