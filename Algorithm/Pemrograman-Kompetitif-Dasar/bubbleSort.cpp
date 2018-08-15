#include<iostream>
#include<algorithm>

using namespace std;

void bubbleSort(int arr[], size_t size) {
    int i, j;
    for(i = 0; i < size; i++) {
        for(j = 0; j < size-1; j++) {
            if(arr[j] > arr[j+1]) {
                swap(arr[j], arr[j+1]);
            }
        }
    }
}

int main() {
    int i, size;
    int *arr;
    cin >> size;
    arr = new int[size];
    for(i = 0; i < size; i++) {
        cin >> arr[i];
    }
    bubbleSort(arr, size);
    for(i = 0; i < size; i++) {
        cout << arr[i] << "\n";
    }
    return 0;
}