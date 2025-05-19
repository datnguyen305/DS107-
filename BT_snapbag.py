# Bài tập Snapbag

class Item(object):
    def __init__ (self, name, weight, value):
        self.name = name
        self.weight = weight
        self.value = value

    def name(self):
        return self.name
    
    def weight(self):
        return self.weight
    
    def value(self):
        return self.value
    
    def __str__(self):
        return f"Item({self.name}, {self.weight}, {self.value})"
    
def buildMenuOfItems(name, weight, value):
    assert len(name) == len(weight) == len(value), "All lists must be of the same length"
    menu = []
    for i in range(len(name)):
        menu.append(Item(name[i], weight[i], value[i]))
    return menu 
    
def GreedySearch(items, maxsize, key):
    items = sorted(items, key=key, reverse=True) # Cao -> thap
    selected_items = []
    TotalValue, TotalWeight = 0,0
    for item in items: 
        if TotalWeight + item.weight <= maxsize:
            selected_items.append(item)
            TotalValue += item.value
            TotalWeight += item.weight
        else: 
            break
    return (selected_items, TotalValue)

if __name__ == '__main__':
    names = ['color pencils', 'eraser', 'ruler', 'pencil', 'sharpener']
    value = [100, 500, 700, 200, 300]
    weight = [2, 6, 4, 7, 10] 

    menu = buildMenuOfItems(names, weight, value)

    print("Select Strat: Weight-based, Value-based, Ratio-based")
    print("1. Weight-based")
    print("2. Value-based")
    print("3. Ratio-based")

    choice = int(input("Enter your choice: "))
    if choice == 1:
        selected_items, TotalValue = GreedySearch(menu, 15, lambda x: 1/x.weight)
    elif choice == 2:
        selected_items, TotalValue = GreedySearch(menu, 15, lambda x: 1/x.value)
    elif choice == 3:
        selected_items, TotalValue = GreedySearch(menu, 15, lambda x: x.value/x.weight)
    else:
        print("Invalid choice")
        exit()

    print ("Selected_items")
    for item in selected_items:
        print(item)
    print(f"Total Value: {TotalValue}")