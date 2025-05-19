from collections import deque

# Định nghĩa trạng thái là tuple: (farmer, fox, goose, beans)
# Mỗi phần có giá trị 'L' (bờ trái) hoặc 'R' (bờ phải)

def is_valid(state):
    f, x, g, b = state
    # Nếu cáo và ngỗng ở cùng bờ mà không có nông dân => không hợp lệ
    if x == g and f != x:
        return False
    # Nếu ngỗng và đậu ở cùng bờ mà không có nông dân => không hợp lệ
    if g == b and f != g:
        return False
    return True

def get_next_states(state):
    f, x, g, b = state
    new_side = 'R' if f == 'L' else 'L'
    candidates = []

    # Di chuyển một mình
    candidates.append((new_side, x, g, b))

    # Mang theo cáo
    if x == f:
        candidates.append((new_side, new_side, g, b))

    # Mang theo ngỗng
    if g == f:
        candidates.append((new_side, x, new_side, b))

    # Mang theo đậu
    if b == f:
        candidates.append((new_side, x, g, new_side))

    # Lọc ra các trạng thái hợp lệ
    return [s for s in candidates if is_valid(s)]

def describe_move(prev, curr):
    items = ['farmer', 'fox', 'goose', 'beans']
    move = []
    for i in range(4):
        if prev[i] != curr[i]:
            move.append(items[i])
    return ', '.join(move)

def bfs_with_log():
    start = ('L', 'L', 'L', 'L')
    goal = ('R', 'R', 'R', 'R')
    queue = deque()
    visited = set()
    parent = {}

    queue.append(start)
    visited.add(start)

    while queue:
        current = queue.popleft()

        if current == goal:
            # reconstruct path
            path = []
            while current in parent:
                path.append(current)
                current = parent[current]
            path.append(start)
            path.reverse()

            # log hành trình
            print("== Hành trình nông dân đưa mọi thứ qua sông ==")
            for i in range(len(path)):
                print(f"Bước {i}: {path[i]}")
                if i > 0:
                    move = describe_move(path[i - 1], path[i])
                    print(f"  => Di chuyển: {move}")
            return path

        for next_state in get_next_states(current):
            if next_state not in visited:
                visited.add(next_state)
                parent[next_state] = current
                queue.append(next_state)

    print("Không tìm thấy giải pháp hợp lệ.")
    return None

# Chạy thuật toán
if __name__ == "__main__":
    bfs_with_log()
